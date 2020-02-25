Vue.component("spinner",{template:"#spinner-loader",props:{status:{type:Boolean,default:!0},rotation:{type:Boolean,default:!0},size:{type:Number,default:30},depth:{type:Number,default:3},speed:{type:Number,default:1},color:{type:String,default:"#6589b6"}},data:()=>({rotationAnimations:["forward","backward"],sizeUnits:"px",timeUnits:"s"}),computed:{rotationDirection(){return this.rotation?this.rotationAnimations[0]:this.rotationAnimations[1]},spinnerSize(){return this.size+this.sizeUnits},spinnerDepth(){return this.depth+this.sizeUnits},spinnerSpeed(){return this.speed+this.timeUnits},spinnerStyle(){return{borderTopColor:this.hexToRGB(this.color,.15),borderRightColor:this.hexToRGB(this.color,.15),borderBottomColor:this.hexToRGB(this.color,.15),borderLeftColor:this.color,width:this.spinnerSize,height:this.spinnerSize,borderWidth:this.spinnerDepth,animationName:this.rotationDirection,animationDuration:this.spinnerSpeed}}},methods:{hexToRGB(e,t){var i=parseInt(e.slice(1,3),16),s=parseInt(e.slice(3,5),16),n=parseInt(e.slice(5,7),16);return t?`rgba(${i}, ${s}, ${n}, ${t})`:`rgb(${i}, ${s}, ${n})`}}}),new Vue({el:"#app-loader",data:function(){return{spinner:{size:70,status:!0,color:"#B1212F",depth:3,rotation:!0,speed:.8}}},mounted:function(){var e=document.body;setTimeout((function(){e.classList.add("loaded")}),1e3)}}),Vue.component("backtotop",{template:"#backtotop",data:function(){return{isVisible:!1}},methods:{initToTopButton:function(){$(document).bind("scroll",function(){var e=$(".goTop");$(document).scrollTop()>250?(e.addClass("isVisible"),this.isVisible=!0):(e.removeClass("isVisible"),this.isVisible=!1)}.bind(this))},backToTop:function(){$("html,body").stop().animate({scrollTop:0},"slow","swing")}},mounted:function(){this.$nextTick((function(){this.initToTopButton()}))}}),new Vue({el:"#app-top"}),Vue.component("modal",{template:"#modal-template"}),new Vue({el:"#app-modal",data:{showModal:!1}}),new Vue({el:"#app-social-modal",data:{showModal:!1}});var emailRE=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,firebaseConfig={apiKey:"AIzaSyAi0HZMbjVLKrfYsCdj3To2osTNCBrg6z4",authDomain:"subscribe-8cae0.firebaseapp.com",databaseURL:"https://subscribe-8cae0.firebaseio.com",projectId:"subscribe-8cae0",storageBucket:"",messagingSenderId:"255887982226",appId:"1:255887982226:web:723e7e885efbc23b"};firebase.initializeApp(firebaseConfig);const db=firebase.firestore();var usersRef=db.collection("india");Vue.component("contact",{template:"#contact",data:function(){return{newUser:{name:"",email:""}}},firebase:{users:usersRef},methods:{submitForm:function(e){this.validate()?this.success():this.fail()},validate:function(){return!(""==this.newUser.name||!this.isAnEmail(this.newUser.email))},success:function(){swal("Success","you did it","success"),this.addUser(),this.saveEntry()},addUser:function(){usersRef.add(this.newUser),this.success&&(this.newUser.name="",this.newUser.email="")},fail:function(){swal("Opps","something is wrong","error")},isAnEmail:function(e){return!!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(e)},saveEntry:function(){this.resetData()},resetData:function(){this.newUser.name="",this.newUser.email=""}}}),new Vue({el:"#app-tab",data:{activetab:0}});