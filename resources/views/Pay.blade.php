@vite(entrypoints: 'resources/css/app.css')
@vite(entrypoints: 'resources/js/app.js')
@vite(entrypoints: 'resources/css/home.css')
@vite(entrypoints: 'resources/css/checkout.css')
@vite('resources/css/pay.css')
@extends('layout.Default')

@section('content')
 <section class="pay"><br><br>
    <h2> STAND A CHANCE TO WIN MERCEDES C200 WK202</h2>
 </section><br><br><br>
 <section class="Payalign">
   <h2 class="compPay">LIVE COMPETITIONS</h2>

   <!-- this div is to show the side to side section -->
   <div class="payroll">
      <div class="competePay">
         <section class="car-showcase">
            <div class="car-card">
               <img src="images/Mercedes.jpg">
               <h3>Mercedes AMG</h3>
               <p>Power • Comfort • Style</p><br>
               <button class="Enter">Enter Now</button><br><br>
            </div>
         </section>
      </div>
      <div class="secondHalf">
         <div><h2><span style="color:red; font-size: larger;">$10.00</span> per entry</h2></div>
         <div><br><br>
            
            <form method="post"action= "{{ route('competition.free-entry', $competition->id) }}">
               @csrf
               <h3>Answer the Question to Get a Free Entry</h3><br>
               <p><strong>What is  capital city of Nigeria</strong> </p>
               <label class="radio">
                  <input type="radio" name="answer" value="Lagos">Lagos
               </label><br>

               <label class="radio">
                  <input type="radio" name="answer" value="Abuja"> Abuja
               </label><br>

               <label class="radio">
                  <input type="radio" name="answer" value="Port-Harcourt"> Port-Harourt
               </label><br>

               <label class="radio">
                  <input type="radio" name="answer" value="Delta"> Delta
               </label><br>

               <button id="submitBtn">Submit</button>

               <p id="message" class="success"></p>
            </form>
            
            @if(session('success'))
             <p style="color:green">{{ session('success') }}</p>
            @endif

            @if(session('error'))
               <p style="color:red">{{ session('error') }}</p>
            @endif
         </div><br>
         <div class="ticket-box">
            <!-- QUICK OPTIONS -->
            <form action="{{ route('basket.add') }}" method="POST" >
               @csrf
               <div class="ticket-card">
                  <input type="hidden" name="type" value="ticket">
                  <input type="hidden" name="name" value="Competition Ticket">
                  <input type="hidden" name="price" value="10">
                  <input type="hidden" name="quantity" value="1" min="1">
                  <button id="submitBtn1">1 Tickets  <br> <b>$10</b></button>
               </div>
            </form><br>

            <form method="POST" action="{{ route('basket.add') }}">
               @csrf
               <div class="ticket-card">
                  <input type="hidden" name="type" value="bundle">
                  <input type="hidden" name="name" value="Bundle Deal">
                  <input type="hidden" name="price" value="50">
                  <input type="hidden" name="quantity" value="25">
                  <button id="submitBtn1">25 Tickets  <br> <b>$50</b></button>
               </div>
               
            </form><br>

            <form action="{{ route('basket.add') }}" method="POST">
               @csrf
               <div class="ticket-card">
                  <input type="hidden" name="type" value="bundle">
                  <input type="hidden" name="name" value="Bundle Deal">
                  <input type="hidden" name="price" value="100">
                  <input type="hidden" name="quantity" value="50">
                  <button id="submitBtn1">50 Tickets  <br> <b>$100</b></button>
               </div>
            </form>
            
         </div>
      </div>
   </div>
   <div class="description">
      <button class="colorless-button" id="toggleButton">
        Prize Description
      </button>

      <div id="paragraph">
         <p>
            <span style="font-size: 25px;">🔥 Win 2011 Mercedes-Benz AMG 🔥</span><br><br>

            We’re giving you the chance to own 2011 Mercedez-Benz AMG — 
            a seriously impressive modern comfort car with just 110,000 km on the clock.

            Finished in a striking Black Paint, this Benz has real presence. 
            It’s fitted with a  exhaust, giving the twin-turbo V8 a sharper, 
            more distinctive tone to match the performance.<br><br>
            KEY DETAILS:<br><br>
         </p>
         <li>Mercedes-Benz</li>
         <br><br>
         <p>This is a once in a lifetime chance to own Mercerdes-Benz So Enjoy it </p><br>
         <p>
            <span style="font-size: 25px;">💷 Prizes</span><br><br>
         </p>
         <li>Mercedes-Benz C200 AMG </li><br>
         <p>This is a once in a lifetime chance to own Mercerdes-Benz So Enjoy it </p><br>
      </div><br>
   </div><br><br>

   <div class="description">
      <button class="colorless-button" id="toggleButton2">
        Rules
      </button>

      <div id="paragraph2">
         <p>
            This competition is open to residents of the SA who are aged 18 or over.

            Participants may enter up to 500 times. The competition will close at 4:00 
            PM on 31 May 2026, and the live draw will take place at 8:30 PM on the same day.

            The draw will be streamed live on our Facebook page. We will also share updates 
            about this and upcoming competitions there, so be sure to follow our page and 
            adjust your settings so our posts appear at the top of your newsfeed.

            For details on how to enter for free, please refer to our Terms & Conditions.

            Whether entering online or by post, you must read and agree to our Terms & Conditions. 
            Entries that do not meet these requirements will not be included in the draw.<br>
            Please note:<br><br>
         </p>
         <li>
            An account must be created before submitting an entry. 
            Entries submitted without an account cannot be processed.
         </li><br>
         <li>
            A valid billing address must be added to your account 
            for your entry to be successfully processed.
         </li><br>
         <li>
            A valid billing address must be added to your account 
            for your entry to be successfully processed.
         </li><br>
         <li>
            Be sure to follow All our social media platforms 
            to further increase your chances of winning 
         </li>
         <br><br>
      </div><br>
   </div><br>
   <section class="FAQs">
      <div class="description">
         <button class="colorless-button" id="toggleButton3">
          FAQS
         </button>

         <div id="paragraph3">
            <p style="font-size: 36px;">
               How many times can I enter this competition?<br><br>
            </p>
            <p style="font-size: 18px;">You can enter this competition up to 500 times.</p><br><br>
            <p style="font-size: 36px;">
               How do i get my Number?<br><br>
            </p>
            <p style="font-size: 18px;">Once your order has been placed your ticket number(s) will be randomly allocated and will show on your order confirmation.
               They will also be emailed to you, and will be available in the My Account area.
            </p><br><br>
            <p style="font-size: 36px;">
               How is the winner chosen?<br><br>
            </p>
            <p style="font-size: 18px;">The draw is done live on Instagram using a random number 
               generator to determine the winning ticket number. You’ll be contacted directly 
               if you have won.
            </p><br><br>
            <p style="font-size: 36px;">
               Can the date be changed?<br><br>
            </p>
            <p style="font-size: 18px;">If all the entries are sold sooner the draw will be brought forward. 
               Keep updated on the confirmed draw date via our Instagram page and website.
            </p><br><br>
            <br><br>
         </div><br>
      </div><br>
   </section>
 </section>
@endsection