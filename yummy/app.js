var express=require("express");
var bodyParser=require("body-parser");

const mongoose = require('mongoose');
mongoose.connect('mongodb://localhost:27017/yummy',{useNewUrlParser: true});



var db=mongoose.connection;
db.on('error', console.log.bind(console, "connection error"));
db.once('open', function(callback){
   console.log("connection succeeded");
})
var app=express()

app.use(bodyParser.json());
app.use(express.static('public'));
app.use(bodyParser.urlencoded({
   extended: true
}));
let id='';
/*
app.get("/", function (req, res) {
   res.render('index', {id: id});
   res.render('login', {id: null});
   res.render('error', {error: null});
   res.render("edit",{details1: null,id:null});//
})*/

app.get('/',function(req,res){
   res.set({
      'Access-control-Allow-Origin': '*'
   });
   return res.redirect('index');
}).listen(3007)

app.post('/signup_yummy', function(req,res){
   var email =req.body.email;
   var name = req.body.name;
   var pass = req.body.password;
   var data = {
      "email":email,
      "name": name,
      "password":pass,
   }
   //db.collection('details1').insertOne(data,function(err, collection){
   db.collection('account').insertOne(data,function(err, collection){
   if (err) throw err;
      console.log("Record inserted Successfully");
   });
   return res.redirect("login");
})
app.post('/delete', function(req,res){
   var MongoClient = require('mongodb').MongoClient;
   var url = "mongodb://localhost:27017/";
   
   MongoClient.connect(url, function(err, db) {
   if (err) throw err;
   var dbo = db.db("yummy");
   const mongodb = require('mongodb');
   const ObjectID = require('mongodb').ObjectID;
   var id_post =req.body.id_post;
   dbo.collection("menu").deleteOne({_id:new mongodb.ObjectID(id_post)}, function(err, obj) {
      if (err) throw err;
      console.log("1 document deleted");
      res.redirect('edit');
   });
   });
})
var edit=null;
app.post('/edit1', function(req,res){
   edit=req.body.id_post1;
   console.log("edit =>",edit);
   res.redirect('edit');
})

app.get('/edit2', function(req,res){
   edit=null;
   res.redirect('edit');
})

app.post('/add_yummy', function(req,res){
   var name =req.body.name_food;
   var price = req.body.price;
   var desc = req.body.description;
   var url =req.body.url;
   var menu =req.body.check_menu;
   var data = {
      "menu":name,
      "price": price,
      "description":desc,
      "url_image":url,
      "id":id,
      "check_menu":menu,
   }
   //db.collection('details1').insertOne(data,function(err, collection){
   db.collection('menu').insertOne(data,function(err, collection){
   if (err) throw err;
      console.log("Record inserted Successfully");
   });
   return res.redirect('edit');
})

app.post('/book_yummy', function(req,res){
   res.redirect('index#book-a-table');
   var name =req.body.name;
   var email = req.body.email;
   var phone = req.body.phone;
   var date =req.body.date;
   var time =req.body.time;
   var people =req.body.people;
   var message =req.body.message;
   var data = {
      "name":name,
      "email": email,
      "phone":phone,
      "date":date,
      "time":time,
      "people":people,
      "message":message,
   }
   //db.collection('details1').insertOne(data,function(err, collection){
   db.collection('book').insertOne(data,function(err, collection){
   if (err) throw err;
      console.log("Record inserted Successfully");
      console.log(collection);
   });
})

app.post('/contact_yummy', function(req,res){
   res.redirect('index#contact');
   var name =req.body.name;
   var email = req.body.email;
   var subject = req.body.subject;
   var message =req.body.message;
   var data = {
      "name":name,
      "email": email,
      "subject":subject,
      "message":message,
   }
   //db.collection('details1').insertOne(data,function(err, collection){
   db.collection('contact').insertOne(data,function(err, collection){
   if (err) throw err;
      console.log("Record inserted Successfully");
      console.log(collection);
   });
})

//
app.post('/edit_yummy', function(req,res){
   var name =req.body.name_food;
   var price = req.body.price;
   var desc = req.body.description;
   var url =req.body.url;
   var id_post=req.body.id_post;
   var menu=req.body.check_menu;
   var data = {
      "menu":name,
      "price": price,
      "description":desc,
      "url_image":url,
      "id":id,
      "check_menu":menu,
   }
   var MongoClient = require('mongodb').MongoClient;
   var url = "mongodb://127.0.0.1:27017/";

   MongoClient.connect(url, function(err, db) {
  if (err) throw err;
  var dbo = db.db("yummy");
  var newvalues = { $set: data};
  const mongodb = require('mongodb');
   const ObjectID = require('mongodb').ObjectID;
  var myquery = {_id:new mongodb.ObjectID(id_post)};
  dbo.collection("menu").updateOne(myquery, newvalues,function(err, res) {
    if (err) throw err;
    console.log("1 document updated");
    console.log(id_post);
  });
  edit=null;
  res.redirect('edit');
});
   
})
//
app.post('/login_yummy', function(req,res){
   var email =req.body.email2;
   var pass = req.body.password2;
   var data = {
      "email":email,
      "password": pass
   }
   var MongoClient = require('mongodb').MongoClient;
   var url="mongodb://localhost:27017/";
   //db.collection('details1').insertOne(data,function(err, collection){
   MongoClient.connect(url, function(err, db) {
      if (err) throw err;
      var dbo = db.db("yummy");
      //Find the first document in the customers collection:
      dbo.collection("account").findOne(data, function(err, result) {
         if (err) throw err;
         console.log(result['_id']);
         id=result['_id'];
         if (result == null){console.log('awikwok');}
         else {var log=1;console.log(log);return res.redirect('index');}
         db.close();
      });
   });
})



/*ALO ALO HATIHATIUTU */

app.use(bodyParser.urlencoded({ extended: true }));
app.set('views','public');
app.set("view engine", "ejs");



app.get("/edit", function (req, res) {
   var MongoClient = require('mongodb').MongoClient;
   var url = "mongodb://localhost:27017/";
   if (id!=''){
   MongoClient.connect(url, function(err, db) {
      if (err) throw err;
      var dbo = db.db("yummy");
      dbo.collection("menu").find({"id":id}).toArray(function(err, result) { 
        if (err) throw err;
        console.log(result);
        if (edit!==null){
         const mongodb = require('mongodb');
         const ObjectID = require('mongodb').ObjectID;
         MongoClient.connect(url, function(err, db) {
            if (err) throw err;
            var id_post =edit;
            dbo.collection("menu").findOne({_id:new mongodb.ObjectID(id_post)}, function(err, obj) {
               if (err) throw err;
               console.log("1 document find");
               console.log(obj);
               console.log(edit);
               res.render("edit", { details1: result,id:id,edit:edit,obj:obj});
            }); 
            
         });
         
         }
        else {res.render("edit", { details1: result,id:id});}
      });
   });
   }
   else {res.render("error", {error:1});}//belum login
})
app.get("/error",function (req, res) {
   if (id!='') res.render('error', {error:0});//0 gada error
})
app.get("/index", function (req, res) {
   //res.render('index', {id:id}) MAINTENANCE
   var MongoClient = require('mongodb').MongoClient;
   var url = "mongodb://localhost:27017/";
   MongoClient.connect(url, function(err, db) {
      if (err) throw err;
      var dbo = db.db("yummy");
      dbo.collection("menu").find({}).toArray(function(err, result) { 
        if (err) throw err;
        res.render('index', {id:id,menu:result});
        console.log(result); 
      });   
   });
})
app.get("/login", function (req, res) {
   if (id==''){
      res.render('login', {id:id});
   }
   else {res.render('error', {error:2});}
})
app.get("/logout", function (req, res) {
   id='';
   res.redirect('index');
})


/**/
console.log("server listening at port 3007");
