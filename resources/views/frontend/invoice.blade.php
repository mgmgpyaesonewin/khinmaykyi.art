<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<div class="container">
    <div class="row" style="background-color: #343352;height: 20%;">
        <div class="col-6">
            <h4 style="margin-left : 50px; padding-top: 70px; color: #fff; font-size: 35px;">Invoice</h4>
        </div>
        <div class="col-6">
             <div style="float:left; color: #fff;">
                <h2 class="logo" style="font-family: dancing script;">KhinMayKyi</h2>
                        <h5 class="card-title"> Your Information : </h5>
                        <p> {{($user->name)}} </p>
                        <p> {{($user->email)}} </p>
                        <h5 class="card-title"> Shipping Address : </h5>
                        <p> {{$user->address}} </p>
                        <p>Phone no:{{$user->phone}}</p>
            </div>
        </div>
    </div>
   
</div> 
