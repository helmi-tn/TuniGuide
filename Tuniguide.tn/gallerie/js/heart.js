
            function Toggle(){
                var btn =  document.getElementById(event.srcElement.id);
                if(btn.classList.contains("far")){
                    btn.classList.remove("far");
                    btn.classList.add("fas");
                }else{
                    btn.classList.remove("fas");
                    btn.classList.add("far");
                }
            }
        