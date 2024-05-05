const site_address  = document.getElementById('site_address');
const  site_title = document.getElementById('site_title');
const genereal_from = document.getElementById('genereal_from');
console.log(site_title);
const site_address_inp = document.getElementById('site_address_inp');
const site_title_inp = document.getElementById('site_address_inp');

// get xml site title 

let xhr = new XMLHttpRequest();
xhr.open('POST', './ajax/setting.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

xhr.send('getgenerel');
xhr.onload = function(){
    let data = JSON.parse(this.responseText);
    console.log(data);
    site_address.innerText = data.site_address;
    site_title.innerText = data.site_name;
}



genereal_from.addEventListener('submit',(ev)=> {
ev.preventDefault();



}) ;




