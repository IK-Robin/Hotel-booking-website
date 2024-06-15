// add carosal js  
var swiper = new Swiper(".rooms_slider", {
    cssMode: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
  }); 

  // add form functionnality 
  const book_now = document.getElementById('book_now');

  const pay_info  = document.getElementById('pay_info');
  const pre_loader = document.getElementById('pre_loader');
  const book_subit = document.getElementById('book_subit');

  const file_path = './admin/ajax/booking_form.php';
  // check rooms is avabilable or not  date USING   AJAX
  function check_rooms_avabilable(date){

    
    let checkInVal = book_now.elements['checkin'].value;
    let checkout = book_now.elements['checkout'].value;
   let xhr = new XMLHttpRequest();
   

    if(checkInVal !=='' && checkout !=='' ){
      let formData = new FormData();
      formData.append('checkin',checkInVal );
      formData.append('checkout', checkout);
      
      formData.append('check_date','');
  
      xhr.open('POST', file_path, true);
  
      xhr.onload =function(){
        if(this.status == 200){
     
          pre_loader.classList.remove('d-none');
          // let data = JSON.parse(this.responseText);
          pay_info.classList.add('d-none');
          // replace painfo class color 
          pay_info.classList.replace('text-dark','text-danger');
          let data = JSON.parse(this.responseText);
          if(data.status == 'check_in_out_equal' ){
            pay_info.innerText ="You cannot Check-out on the same day ?";
          } else if(data.status =='check_out_earlier'){
            pay_info.innerText ="You cannot Check-out before Check-in ?";
          } else if (data.status =='check_in_earlier'){
            pay_info.innerText ="You cannot Check-in before today' date ?";
          }else if( data.status =='unavailable'){
            pay_info.innerText ="Sorry, this room is not available on this date ?";
          }else{
            pay_info.classList.replace('text-danger','text-dark');
            pay_info.innerHTML ="No of Days: "+ data.days +'<br>' +'Total Amount to Pay:$' + data.payment;
            book_subit.removeAttribute("disabled");
          }

          pre_loader.classList.add('d-none');
          pay_info.classList.remove('d-none');
        }
      }
      xhr.send(formData);
      // empity the valu after submit 
      checkout='';
      checkInVal='';
    }




  }



  book_now.addEventListener('submit',(ev) =>{
    ev.preventDefault();
    book_new_room();

  });
  
  function book_new_room (){
    let checkInVal = book_now.elements['checkin'].value;
    let checkout = book_now.elements['checkout'].value;
      // append formdata 
      let formData = new FormData();
      formData.append('checkin',checkInVal );
      formData.append('checkout', checkout);
      formData.append('name',book_now.elements['name_book'].value);
      formData.append('phone_book',book_now.elements['phone_book'].value);
      formData.append('address',book_now.elements['address'].value);
      formData.append('room_id',book_now.elements['room_id'].value);
      formData.append('book_now','');
  
      let xhr = new XMLHttpRequest();
      xhr.open('POST', file_path, true);
  
      xhr.onload = function () {
        if (this.status == 200) {
          console.log(this.responseText);
          if(this.responseText == 'success'){
            // alerts('success','Room book successfull');
            book_subit.setAttribute('disabled',true);
            // var url = 'confarm_booking.php?room_id=' + book_now.elements['room_id'].value

            // Redirect the user to confarm_booking.php with the parameters
            window.location.href = `confarm_booking.php?id= ${book_now.elements['room_id'].value}`;


          }
        }
      }
      xhr.send(formData);
  
    
  }
  window.onload = check_rooms_avabilable();
