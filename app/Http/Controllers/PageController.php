<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Store;
use App\Banner;
use App\Food;
use App\User;
use App\Repositories\PageRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Bill;
use Cart;
use App\Order;
use App\orderDetail;
use App\Http\Requests\UserRequest;
use App\Http\Requests\NewsRequest;
use Mail;
use App\News;

class PageController extends Controller
{   
    protected $foodSale, $foodNew, $foodTop, $banner1, $banner2, $banner3, $banner4, $user, $food;

    public function __construct(PageRepository $foodSale, PageRepository $banner1, PageRepository $banner2,  PageRepository $banner3, PageRepository $banner4, PageRepository $foodNew, PageRepository $foodTop, PageRepository $user, PageRepository $food)
    {   
        $this->banner1 = $banner1;
        $this->banner2 = $banner2;
        $this->banner3 = $banner3;
        $this->banner4 = $banner4;
        $this->foodSale = $foodSale;        
        $this->foodNew = $foodNew;
        $this->foodTop = $foodTop;
        $this->user = $user;
        $this->food = $food;
    }

    public function getHome()
    {
        $banner1 = $this->banner1->banner1();
        $banner2 = $this->banner2->banner2();
        $banner3 = $this->banner3->banner3();
        $banner4 = $this->banner4->banner4();
        $foodSale = $this->foodSale->saleFood();
        $foodNew = $this->foodNew->newFood();
        $foodTop = $this->foodTop->topFood();
      
        return view('front.pages.home', compact('banner1', 'banner2', 'banner3', 'banner4', 'foodSale', 'foodNew', 'foodTop'));
    }

    public function getLogin()
    {
        return view('front.pages.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $validated = $request->validated();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {   
            $user = Auth::user();
            if($user->level == 0)
            {
                return redirect(route('dashboard'));
            } else 
            {
                return redirect(route('home'));
            }
    		return redirect(route('home'));
        } else 
        { 
    		return redirect(route('login'))->with('message', trans('setting.loginpage.fail'));
    	}
    }

    public function getLogout()
    {
        Auth::logout();

    	return redirect(route('home'));
    }

    public function getSignup()
    {
        return view('front.pages.register');
    }

    public function postSignup(RegisterRequest $request)
    {
        $user = $this->user->addUser($request);

        return redirect('login')->with('message', trans('setting.registerpage.success'));
    }

    public function food($id)
    {
        try
        {
            $food = $this->food->findOrFail($id);           
            foreach($food->categories as $ca)
            {              
                $dataFood = $ca->pivot->category_id;
                
            } 

            return view('front.pages.food', compact('food', 'dataFood'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function category($id)
    {
        try
        {
            $categoryFood = Category::findOrFail($id);           

            return view('front.pages.category', compact('categoryFood', 'id'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function getSearch(Request $request)
    {
        $result = $request->result;
        $food = Food::where('name', 'like', '%'.$result.'%')->orWhere('price', 'like', '%'.$result.'%')->paginate(5);

        return view('front.pages.search', compact('result', 'food'));
    }

    public function getOrder()
    {   
        $orderCart = Cart::content();

        return view('front.pages.order', compact('orderCart'));
    }

    public function postOrder(Request $request)
    {   
        if (Auth::check())
        {
            $user = Auth::user();
            $cart = Cart::content();
            $order = new Order;
            $order->user_id = $user->id;
            $order->date_order = date('Y-m-d H:i:s');
            $order->total = str_replace(',', '', Cart::total());
            $order->payment = $request->payment;
            $order->note = $request->note;
            $order->status = 0;
            $order->save();
            if (count($cart) > 0)
            {
                foreach ($cart as $ca)
                {
                    $order_detail = new orderDetail;
                    $order_detail->order_id = $order->id;
                    $order_detail->food_id = $ca->id;
                    $order_detail->quanity = $ca->qty;
                    $order_detail->unit_price = $ca->price * $ca->qty;
                    $order_detail->save();
                }
            }
            $data['info'] = [
                'name' => $user->name,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'address' => $user->address,
            ];
            $email = $user->email;
            $name = $user->name;
            $data['cart1'] = Cart::content();
            Mail::send('front.pages.email', $data, function ($message) use($email, $name) {
                $message->from('namhuydo18@gmail.com', 'Food Order');
                $message->to($email, $name);
                $message->subject('Xác nhận đơn đặt hàng');
            });
            Cart::destroy();      
            
            return redirect(route('complete'));
        }     
    }

    public function getUser()
    {   
        $user = Auth::user();
        return view('front.pages.user', compact('user'));
    }

    public function postUser(UserRequest $request)
    {
        $user = Auth::user();
        $validated = $request->validated();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        if ($request->password != null)
        {
            $user->password = bcrypt($request->password);
        }
        $user->level = 1;
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . '_' . $name;
            while (file_exists("upload/user/" . $avatar)) 
            {
                $avatar = str_random(4) . '_' . $name;
            }
            $file->move(config('setting.avatar.user'), $avatar);
            $user->avatar = $avatar;
        }
        $user->save();

        return redirect(route('user'))->with('message', trans('setting.save_success'));
    }

    public function postNews(NewsRequest $request)
    {
        $user = Auth::user();
        $news = new News;
        $validated = $request->validated();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->description = $request->description;
        $news->user_id = $user->id;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . '_' . $name;
            while (file_exists("upload/news/" . $image)) 
            {
                $image = str_random(4) . '_' . $name;
            }
            $file->move(config('setting.avatar.news'), $image);
            $news->image = $image;
        }
        else
        {
            $news->image = '';
        }
        $news->save();

        return redirect(route('user'))->with('message', trans('setting.post_success'));
    }

    public function getListOldCart($id)
    {
        try
        {   
            $order = Order::findOrFail($id);

            return view('front.pages.oldCart', compact('order'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }

    }

    public function getComplete()
    {
        return view('front.pages.complete');
    }

    public function getNews()
    {   
        $news = News::paginate(config('pagination.news'));

        return view('front.pages.news', compact('news'));
    }

    public function getNewsDetail($id)
    {
        try
        {
            $news = News::findOrFail($id); 
            $user = News::where('user_id', $news->user_id)->take(5)->get();       

            return view('front.pages.newsDetail', compact('news', 'user'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}

