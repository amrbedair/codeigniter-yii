codeigniter-yii
===============

integrate yii with codeigniter, to enable using yii awesome grid view inside codeigniter projects

***This project uses Yii 1.1.15, and CodeIgniter 2.2.0***

![Sample]("http://comp.nefya.com/images/Screenshot 2014-08-16 00.06.38.png")

I have searched for a good codeigniter grid ***"googled: best codeigniter grid"*** widget to use in a project that I was assigned to maintain it, 
but after awhile it was obvious that I will not find what I am searching for, ... 
coming from a Yii background I was searching for a non existing thing ... 
actually Yii's out of the box grid widget is one of the its best features, 
and one of the best grid widgets I have seen ever, also it has some awesome extensions developed by 
[CleverTech](http://clevertech.biz), [see](http://yiibooster.clevertech.biz/extendedGridView/index.html), 
so I have decided to use it in my CI project, 

I have spent some time to allow this work, but here we are, it is working perfect, this is the steps to do this:

- add application/classes [app, yii, booster(if you want to use it)]
- in YiiBase.php
  * change the function `autoload` to let the `else` of the `if(self::$enableIncludePath===false) { ... code ... } else { /* do nothing */ }`
  * comment the line before the last line to prevent using Yii's auto loader `// spl_autoload_register(array('YiiBase','autoload'))`;
- create application/classes/autoloader.php [be sure path is writable for the map]
- add the classes CIWebController, and CIUrlManager 
- in index before require_once BASEPATH.'core/CodeIgniter.php';
  * require auto loader, and yii.php
  * init a yii app and note
    * 'basePath' => APPPATH,
    * config db component with your settings 
    * config urlManger class to CIUrlManager, and do not forget to add the 3 basic rules 
    * config assetManager basePath, and baseUrl
    * add any components you may need
  * $yii_app->controller = new CIWebController('dummy');
- add the MY_URI class that extends the ci CI_URI and change _detect_uri() last line
- add the MY_Loader that extends CI_Loader
  * in MY_Loader add the functions yii_view(), and widget()
- in your view use $this->load->widget('CGridView', []);
