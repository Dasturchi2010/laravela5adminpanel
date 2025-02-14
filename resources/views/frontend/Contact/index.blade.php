@extends('frontend.layouts.site')
@section('front_content')

    <div class="container">
       <div class="row">
          <div class="col-12 text-center mt-2 mb-2">
            <h1 class="portfolio_taital">My <span class="portfolio_taital_1">Services</span></h1>
          </div>

            <div class="col-md-12">
                <form action="{{ route('send_contact') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mail_section_1">
                        <input type="text" class="mail_text" placeholder="Your Name" name="name" value="{{old('name')}}" required>
                        <p class="text-danger">@error('name') {{$message}} @enderror</p>
                        <input type="text" class="mail_text" placeholder="Your Email" name="email" value="{{old('email')}}" required>
                        <p class="text-danger">@error('email') {{$message}} @enderror</p>
                        <input type="text" class="mail_text" placeholder="Your Phone" name="phone" value="{{old('phone')}}" required>
                        <p class="text-danger">@error('phone') {{$message}} @enderror</p>
                        <textarea class="massage-bt" placeholder="Your Massage" rows="5" id="comment" name="message" required>{{old('message')}}</textarea>
                        <div class="send_bt">
                            <button type="submit" class="btn btn-warning">Yuborish</button>
                        </div>
                    </div>
                </form>
            </div>

          </div>
       </div>

@endsection
