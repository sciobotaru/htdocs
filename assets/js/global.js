$(function(){
    filterObj = new Object();

    function getUrlVars() 
    {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
            if (vars[key]) {
                if (vars[key] instanceof Array) {
                    vars[key].push(value);
                } else {
                    vars[key] = [vars[key], value];
                }
            } else {
                vars[key] = value;
            }
        });
        
        for(var key in vars)
        {
            if(key=="page")
            {
                filterObj.page=vars[key];
            }
            if(key=="search")
            {
                filterObj.search=vars[key].replace(/\+/g,' ');
            }
            if(key=="pret")
            {
                filterObj.pret=vars[key].replace(/\+/g,' ');
            }
            if(key=="magazin")
            {
                filterObj.magazin=vars[key];
            }
            if(key=="categorie")
            {
                filterObj.categorie = vars[key].replace(/\+/g,' ').replace(/%26/g,'&'); //workaround pentru link
                //alert("Categorie gasita: " + filterObj.categorie); // ----------------- DEBUG ------------------
            }
        }
        filterObj.page = 1;
    }

            
    $("#urmatoareaup").click(function(){
        var currpage = parseInt($("#currentpageno").text());
        if(currpage < parseInt($("#maxpages").text()))
        {
            getUrlVars();
            filterObj.page = ++currpage;
            location.href = "index.php?" + $.param(filterObj);
        }
    });
        
    $("#anterioaraup").click(function(){
        var page = parseInt($("#currentpageno").text());
        if(page>1)
        {
            getUrlVars();
            filterObj.page=--page;
            location.href = "index.php?" + $.param(filterObj);
        }
    });
        
    $("#urmatoareadown").click(function(){
        var currpage = parseInt($("#currentpageno").text());
        if(currpage < parseInt($("#maxpages").text()))
        {
            getUrlVars();
            filterObj.page = ++currpage;
            location.href = "index.php?" + $.param(filterObj);
        }
    });
        
    $("#anterioaradown").click(function(){
        var page = parseInt($("#currentpageno").text());
        if(page>1)
        {
            getUrlVars();
            filterObj.page=--page;
            location.href = "index.php?" + $.param(filterObj);
        }
    });
                
            
        
        //------- CATEGORII START ----
        
    $("#AparateFoto").click(function(){
        var cat = $("#AparateFoto").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#CamereVideo").click(function(){
        var cat = $("#CamereVideo").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
            
    $("#Desktop").click(function(){
        var cat = $("#Desktop").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });    
        
    $("#HomeCinema").click(function(){
        var cat = $("#HomeCinema").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Laptopuri").click(function(){
        var cat = $("#Laptopuri").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });    
            
    $("#Monitoare").click(function(){
        var cat = $("#Monitoare").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Tablete").click(function(){
        var cat = $("#Tablete").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Telefoane").click(function(){
        var cat = $("#Telefoane").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Televizoare").click(function(){
        var cat = $("#Televizoare").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Aragaze").click(function(){
        var cat = $("#Aragaze").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Aspiratoare").click(function(){
        var cat = $("#Aspiratoare").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Fiare").click(function(){
        var cat = $("#Fiare").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Frigidere").click(function(){
        var cat = $("#Frigidere").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Hote").click(function(){
        var cat = $("#Hote").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Masini").click(function(){
        var cat = $("#Masini").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Imprimante").click(function(){
        var cat = $("#Imprimante").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    }); 
        
    $("#retelistica").click(function(){
        var cat = $("#retelistica").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    }); 
        
        /////////////////////////////////////////////////
        
    $("#Espresoare").click(function(){
        var cat = $("#Espresoare").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#Mixere").click(function(){
        var cat = $("#Mixere").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
            
    $("#Aparatedeaerconditionat").click(function(){
        var cat = $("#Aparatedeaerconditionat").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });
            
    $("#Aparatedeincalzire").click(function(){
        var cat = $("#Aparatedeincalzire").text();
        getUrlVars();
        filterObj.categorie=cat;
        location.href = "index.php?" + $.param(filterObj);
    });   
        
        
        //------- CATEGORII SFARSIT ----
        
        
        
        //------- PRETURI START ----
        
    $("#sub200").click(function(){
        var price = $("#sub200").text();
        getUrlVars();
        filterObj.pret=price;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#200500").click(function(){
        var price = $("#200500").text();
        getUrlVars();
        filterObj.pret=price;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#5001000").click(function(){
        var price = $("#5001000").text();
        getUrlVars();
        filterObj.pret=price;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#10002000").click(function(){
        var price = $("#10002000").text();
        getUrlVars();
        filterObj.pret=price;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#peste2000").click(function(){
        var price = $("#peste2000").text();
        getUrlVars();
        filterObj.pret=price;
        location.href = "index.php?" + $.param(filterObj);
    });
        
        //------- PRETURI END ----
        
        
        //------- MAGAZIN START ----
        
    $("#badabum").click(function(){
        var mag = $("#badabum").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#flanco").click(function(){
        var mag = $("#flanco").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#evomag").click(function(){
        var mag = $("#evomag").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#pcgarage").click(function(){
        var mag = $("#pcgarage").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#cel").click(function(){
        var mag = $("#cel").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#itgalaxy").click(function(){
        var mag = $("#itgalaxy").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#avstore").click(function(){
        var mag = $("#avstore").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#f64").click(function(){
        var mag = $("#f64").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#stradait").click(function(){
        var mag = $("#stradait").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
    $("#germanos").click(function(){
        var mag = $("#germanos").text();
        getUrlVars();
        filterObj.magazin=mag;
        location.href = "index.php?" + $.param(filterObj);
    });
        
        //------- MAGAZIN END ----
            
    $("#deleteFilters").click(function(){
            removeFilters();
        });
        
    function removeFilters()
    {
        location.href = "/";
    }
        
        //-------- MOUSE OVER OPEN MENU -----
    $("#electronice").mouseover(function(){
        $(".dropdown-toggle").parent().addClass("dropdown");
        $(".dropdown-toggle").parent().removeClass("dropdown open");
        $("#electronice").parent().addClass("dropdown open");
        $("#electronice").parent().removeClass("dropdown");
    });

    $("#electrocasnice").mouseover(function(){
        $(".dropdown-toggle").parent().addClass("dropdown");
        $(".dropdown-toggle").parent().removeClass("dropdown open");
        $("#electrocasnice").parent().addClass("dropdown open");
        $("#electrocasnice").parent().removeClass("dropdown");
    });

    $("#pret").mouseover(function(){
        $(".dropdown-toggle").parent().addClass("dropdown");
        $(".dropdown-toggle").parent().removeClass("dropdown open");
        $("#pret").parent().addClass("dropdown open");
        $("#pret").parent().removeClass("dropdown");
    });
        
    $("#magazin").mouseover(function(){
        $(".dropdown-toggle").parent().addClass("dropdown");
        $(".dropdown-toggle").parent().removeClass("dropdown open");
        $("#magazin").parent().addClass("dropdown open");
        $("#magazin").parent().removeClass("dropdown");
    });
});