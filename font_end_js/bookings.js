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
  const file_path = './admin/ajax/booking_form.php';
  // check rooms is avabilable or not  date USING   AJAX
  function check_rooms_avabilable(date){
    pre_loader.style.display = 'block';
    let checkInVal = book_now.elements['checkin'].value;
    let checkout = book_now.elements['checkout'].value;
   let xhr = new XMLHttpRequest();
    let formData = new FormData();
    formData.append('checkin',checkInVal );
    formData.append('checkout', checkout);
    
    formData.append('check_date','');

    xhr.open('POST', file_path, true);

    xhr.onload =function(){
      if(this.status == 200){
        // let data = JSON.parse(this.responseText);
        console.log(this.responseText);
      }
    }

    if(checkInVal !=='' && checkout !=='' ){

      xhr.send(formData);
    }




  }

  