class Item{
    constructor(id, name, price){ 
       this.id=id;
       this.name=name;
       this.price=price;
       this.quantity=1;
 }
}

function formatItemAsHTML(item){
   return "<p>"+item.name+" amount: "+item.quantity+" price: "+item.price+ " €" +"</p>";
}

 let shoppingCart=[];
 if(localStorage.getItem("shoppingCart")!=null){
   shoppingCart=JSON.parse(localStorage.getItem("shoppingCart"));
 }
 
 function addToCart(id,name,price){
    for(let i=0;i<shoppingCart.length;i++){
       if(shoppingCart[i].id==id){
          shoppingCart[i].quantity++;
          shoppingCart[i].price=price*shoppingCart[i].quantity;
          showShoppingCart();
          return;
       }
    }
    shoppingCart.push(new Item(id,name,price));
    localStorage.setItem("shoppingCart",JSON.stringify(shoppingCart));
    showShoppingCart();
 }


 function showShoppingCart(){
   let html="Shopping cart<br>";
   for(let i=0;i<shoppingCart.length;i++){
      html+=formatItemAsHTML(shoppingCart[i]);
   }
   let contactValueName="";
   let contactValueEmail="";
   let contactValueNumber="";
   let contactValueAddress="";
   if(localStorage.getItem("contactName") != null){
      contactValueName=localStorage.getItem("contactName");}
      if(localStorage.getItem("contactEmail") != null){
         contactValueEmail=localStorage.getItem("contactEmail");}
         if(localStorage.getItem("contactNumber") != null){
            contactValueNumber=localStorage.getItem("contactNumber");}
            if(localStorage.getItem("contactAddress") != null){
               contactValueAddress=localStorage.getItem("contactAddress");}
   
   if(shoppingCart.length>0){
      html+="<input onInput='saveContactInfo()' id='contactName' type='text' "+
         "placeholder='enter your name'"+
         "value='"+contactValueName+"'"+
         "></input>";
      html+="<input onInput='saveContactInfo()' id='contactEmail' type='email' "+
         "placeholder='enter your email'"+
         "value='"+contactValueEmail+"'"+
         "></input>";
      html+="<input onInput='saveContactInfo()' id='contactNumber' type='text' "+
         "placeholder='enter your phone number'"+
         "value='"+contactValueNumber+"'"+
         "></input>";
      html+="<input onInput='saveContactInfo()' id='contactAddress' type='text' "+
         "placeholder='enter your street address'"+
         "value='"+contactValueAddress+"'"+
         "></input>";
      html+="<button onClick='placeOrder()'>Send</button>";
   }
   shoppingCartContainer.innerHTML=html;
}

function saveContactInfo(){
   if(document.getElementById("contactName") && contactName.value!=""){
      localStorage.setItem("contactName",contactName.value);
   }
      if(document.getElementById("contactEmail") && contactEmail.value!=""){
         localStorage.setItem("contactEmail",contactEmail.value);
      }
         if(document.getElementById("contactNumber") && contactNumber.value!=""){
            localStorage.setItem("contactNumber",contactNumber.value);
         }
            if(document.getElementById("contactAddress") && contactAddress.value!=""){
               localStorage.setItem("contactAddress",contactAddress.value);
            }
}

function placeOrder(){
   if(contactName.value==""){
      alert("Please enter your Name");
      return false}
      if(contactEmail.value==""){
         alert("Please enter your email");
         return false}
         if(contactEmail.value!="" && contactEmail.value.indexOf("@")== -1 || contactEmail.value.indexOf(".")== -1 || contactEmail.value < 6){
            alert("please enter valid email address");
            return false}
            if (contactNumber.value==""){
               alert("Enter your phone number");
              return false}
               if (contactNumber.value!="" && contactNumber.value.length !=10){
                  alert("Enter valid phone number");
                  return false
   }
   else{
      fetch("placeOrder.php?content="+JSON.stringify(shoppingCart)+
         "&name="+contactName.value+
         "&email="+contactEmail.value+
         "&number="+contactNumber.value+
         "&address="+contactAddress.value);
      shoppingCart=[];
      showShoppingCart();
      alert("Order placed");
   }
}


function deleteItem(id){
   //alert(JSON.stringify(shoppingCart));
   fetch("deleteItem.php?id="+id).
      then(function(){location.reload();
      });
}
 
function search(string){
   window.find(string);
}

