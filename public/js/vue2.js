
var data={
    
}

Vue.component('list-persona',{
template:
`        
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
Añadir persona
</button>
`,computed:{
    ver:function(){
        if(this.item=="" || this.item==undefined)
        {
            opt="ok";
        }
        else{ opt="nok"}
        return opt;
    }
},
data: function(){
 return data;
},

methods:{
   
}

});

var user="http://localhost:8000/api/personaRest";
var app =new Vue({
    el:'#appvue2',  
    data:{
        
        datos:[{id:1, nombre:'haner johan riascos',cedula:12347,programa:'ingenieria en sistemas'},
        {id:2, nombre:'hanower junior',cedula:772367,programa:'ingenieria en sistemas'},
        {id:3, nombre:'tasis',cedula:111177268,programa:'ingenieria en sistemas'}],

    msg:'',
    activo:true,
    addpersona:false,
    input:'',
    keyidpersona:'',
    dats:[]
},mounted:function(){
    this.getdata();
},
       methods:{
           activar: function(){
            this.activo=true;
            console.log('item '+ this.item);
           
           
        }, buscarPersona: function(idpersona){           
        
                console.log(idpersona);          
                this.input=idpersona.Nomcompleto;
                this.keyidpersona=idpersona.idpersona;
                
                this.activo=false;
        },
        getdata:function(){

            this.$http.get(user).then(function(response){
                this.dats=response.body;
            });
            /*axios.get('http://localhost:8000/api/personaRest').then(result=>{
                console.log(result.data);
            });*/
        }
    }   
   
});
