<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Booking;
use Carbon\Carbon;
class BookingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $books = Book::all();
       foreach ($books as $book){
          $copy=DB::table('copies')->where ('book_id','=', $book->id)
                                   ->where('conservation','=','Bom')
                                   ->get();
          If ($copy->isEmpty()){
              $copies[$book->id]=0;
          }
          else{
              $copies[$book->id]=1;
          }

          foreach($book->users as $user){
              If ($user->id = Auth::user()->id){
                $livro[$book->id]=1;
              }
              else{
                $livro[$book->id]=0;
              } 
          }
       } 
       return view('homepage.index', compact('books','copies','livro'));
    }
    
    public function ExistCopy($id)
    {
          $copy=DB::table('copies')->where ('book_id','=', $id)
                                   ->where('conservation','=','Bom')
                                   ->get();
          return $copy;
    }


    public function create($id)
    {
           $book = Book::find($id);
           return view('booking.register', compact('book'));
    }
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
        /*    'title' => 'required|string|255',*/
            'start_date' => 'required',
            'duration' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('booking/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user_id = Auth::user()->id;
        $start_date = Carbon::parse(date_format(date_create($request->start_date),'Y-m-d H:i:s'));
        $end_date = Carbon::parse(date_format(date_create($request->start_date),'Y-m-d H:i:s'));
        $end_date->addSeconds($request->duration);
        /*
        $i=0;
        do{
            $i++;
           $copy=DB::table('copies')->where ('id','=', $i)
                                    ->where ('book_id','=', $request->book_id)
                                    ->where('conservation','=','Bom')
                                    ->get()->first();
           //if (!empty($copy)){                         
           $num=DB::table('Bookings')->where(function ($query){
                                      $query->where('copy_id', '=',4)->where('start_date','<=',$request->start_date)->where('end_date','>=',$request->start_date);
                                    })->orWhere(function ($query){
                                      $query->where('start_date', '>',$request->start_date)
                                      ->where('start_date','<',$request->end_date);
                                    })->count();
           if($num==0){
            $copy_id= $copy->id;
           } //}   
        }while ($num<>0); */

                            $copy=DB::table('copies')->where ('book_id','=', $request->book_id)
                                    ->where('conservation','=','Bom')
                                    ->get()->first();
                                    $copy_id= $copy->id;
            
        $randomString = str_random(8);
            
        $subscribe        = new Booking;
        $subscribe->cod_booking = $randomString;
        $subscribe->start_date = $start_date;
        $subscribe->end_date = $end_date;
        $subscribe->user_id = $user_id;
        $subscribe->copy_id =  $copy_id;
        $subscribe->status = 'reservado';
        $subscribe->save();
         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('homepage')->with('message','Reserva efectuada com sucesso! O seu código de reserva é: '.$randomString);
    }
}