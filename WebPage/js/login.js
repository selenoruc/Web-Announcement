/*TextBoxların boş olup olmadığını kontrol eden fonksiyon*/
function checkFields(){
    var username = document.getElementById("username").value;   /*Username textbox'ındaki değer alınıyor*/
    var password = document.getElementById("password").value;   /*Password textbox'ındaki değer alınıyor*/
  
    /*Girilen değerlerin boş olup olmadığı kontrol ediliyor.*/
    if(username == "" || password == "")
    {
      alert("Bu alanlar boş bırakılamaz");  //Eğer boş değer girilmiş ise ekrana mesaj yazdırılıyor.
    }
  
  }