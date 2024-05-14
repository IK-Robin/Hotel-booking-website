const rooms_form = document.getElementById('rooms_form');
const rooms_submit = document.getElementById('rooms_submit');
const file_path = './ajax/rooms.php';

rooms_form.addEventListener('submit', ev => {
    ev.preventDefault();
    let xhr = new XMLHttpRequest();
    let formdata = new FormData();
    formdata.append('rooms_name',rooms_form.elements['rooms_name'].value);

    formdata.append('area',rooms_form.elements['area'].value);
    formdata.append('rooms_desc',rooms_form.elements['rooms_desc'].value);
    formdata.append('price',rooms_form.elements['price'].value);
    formdata.append('quentity',rooms_form.elements['quentity'].value);
    formdata.append('audlt',rooms_form.elements['audlt'].value);
    formdata.append('children',rooms_form.elements['children'].value);

    let featurs = [];

    let slectAllfeature = rooms_form.elements['feature'];
    let selectAllFacilities = rooms_form.elements['facilities'];
    slectAllfeature.forEach(ele  => {
        // console.log(ele);
        if(ele.checked){
            featurs.push(ele.value);
        }
    });
    // facilitey append 
    let facility = [];
    selectAllFacilities.forEach(ele  => {
        // console.log(ele);
        if(ele.checked){
            facility.push(ele.value);
        }
    });

    // pusht the facility 

    formdata.append('featurs',JSON.stringify(featurs));
    formdata.append('facility',JSON.stringify(facility));
    // Append additional data
    formdata.append('add_rooms', ''); 



    xhr.open('POST', file_path, true);


    xhr.onreadystatechange = function () {
    // let hidemodal =bootstrap.Modal.getInstance(rooms_submit);
    // hidemodal.hide();
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Handle successful response here
                console.log(xhr.responseText);
            } else {
                // Handle error response here
                console.error('Request failed:', xhr.status);
            }
        }
    };
    xhr.send(formdata);
});
