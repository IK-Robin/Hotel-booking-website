const rooms_form = document.getElementById("rooms_form");
const rooms_data = document.getElementById("rooms_data");
const file_path = "./ajax/rooms.php";
const rooms_form_edit = document.getElementById('rooms_form_edit');


rooms_form.addEventListener("submit", (ev) => {
  ev.preventDefault();
  let xhr = new XMLHttpRequest();
  let formdata = new FormData();
  formdata.append("rooms_name", rooms_form.elements["rooms_name"].value);

  formdata.append("area", rooms_form.elements["area"].value);
  formdata.append("rooms_desc", rooms_form.elements["rooms_desc"].value);
  formdata.append("price", rooms_form.elements["price"].value);
  formdata.append("quentity", rooms_form.elements["quentity"].value);
  formdata.append("audlt", rooms_form.elements["audlt"].value);
  formdata.append("children", rooms_form.elements["children"].value);

  let featurs = [];

  let slectAllfeature = rooms_form.elements["feature"];
  let selectAllFacilities = rooms_form.elements["facilities"];
  slectAllfeature.forEach((ele) => {
    // console.log(ele);
    if (ele.checked) {
      featurs.push(ele.value);
    }
  });
  // facilitey append
  let facility = [];
  selectAllFacilities.forEach((ele) => {
    // console.log(ele);
    if (ele.checked) {
      facility.push(ele.value);
    }
  });

  // pusht the facility

  formdata.append("featurs", JSON.stringify(featurs));
  formdata.append("facility", JSON.stringify(facility));
  // Append additional data
  formdata.append("add_rooms", "");

  xhr.open("POST", file_path, true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Handle successful response here
        console.log(xhr.responseText);
        if (xhr.responseText == 1) {
          alerts("success", "Rooms Added Successfully");
       
          get_all_rooms();
          var myModalEl = document.getElementById("rooms-s");
          var modal = bootstrap.Modal.getInstance(myModalEl);
          modal.hide();
        }
      } else {
        // Handle error response here
        console.error("Request failed:", xhr.status);
      }
    }
  };
  xhr.send(formdata);
});
// rooms from edit 


function featch_rooms_data(val){




  let xhr = new XMLHttpRequest();
  xhr.open("POST", file_path, true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


xhr.onload = function(){
  if (xhr.status === 200) {
   
     var data = JSON.parse(xhr.responseText);
     console.log(xhr.responseText);
     const roomData = data.roomsData;
     const features = data.features;
     const facilitey = data.facility;
     rooms_form_edit.elements['hidden_id'].value = roomData.id;
    // Handle successful response here
    
  rooms_form_edit.elements["rooms_name"].value =roomData.rooms_names;

  rooms_form_edit.elements["area"].value =roomData.area;
  rooms_form_edit.elements["price"].value =roomData.price;
  rooms_form_edit.elements["quentity"].value =roomData.quentity;
  rooms_form_edit.elements["audlt"].value =roomData.audlt;
  rooms_form_edit.elements["children"].value =roomData.children;


   let featurs = [];

  let slectAllfeature = rooms_form_edit.elements["feature"];
  let selectAllFacilities = rooms_form_edit.elements["facilities"];
  slectAllfeature.forEach((ele) => {
    // console.log(ele);
  features.forEach(item =>{
    if (item == ele.value) {
      ele.checked = true;
    }
  })
  });


  selectAllFacilities.forEach((ele) => {
    // console.log(ele);
  facilitey.forEach(item =>{
    if (item == ele.value) {
      ele.checked = true;
    }
  })
  });
    
   }
}

 
 
  xhr.send('get_rooms_data='+ val);

  // pusht the facility





}


// add active and inactive rooms 











function rooms_active_inactive(id,val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST",file_path, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function (){
        if (this.status == 200 && this.response==1){
            alerts('success','Room is close');
            get_all_rooms();
        }else{
            alerts('error','Room is open');
        }
    }

    xhr.send('toggle_statue='+id +'&value=' + val);
};




function get_all_rooms() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST",file_path, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function (){
        if (this.status == 200){
            rooms_data.innerHTML =this.responseText;
        }
    }

    xhr.send('get_all_rooms');
};



window.onload =get_all_rooms();