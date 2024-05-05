const site_address  = document.getElementById('site_address');
const  Site_itle = document.getElementById('Site_itle');


let xhr = new XMLHttpRequest();
xhr.open('POST', '../ajax/setting.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

xhr.send('generel_submit');

console.log(site_address);