<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    //
    protected $fillable = ['firm_name','firm_mobile','pincode','since','street','landmark','address',
    'city','state','country','pan_no','map','register_no','gst_no','profilepic','user_id'];
}


// namespace App\Http\Livewire;

// use Livewire\Component;

// class PostCurd extends Component
// {
//     public function render()
//     {
//         return view('livewire.post-curd');
//     }
// }