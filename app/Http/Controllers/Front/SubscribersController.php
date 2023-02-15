<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscribersController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
        ]);

        $sub = Subscription::add($request->get('email'));
        $sub->generateToken();

        return redirect()->back()->with('status', 'Подписка успешно оформлена');
    }
}
