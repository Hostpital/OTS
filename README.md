OTS
=======

This small assignment project is regarding to create operating rooms specialists, sessions & anesthetists and list all on index page /. I have used some third party bundle like Gedmo, DoctrineFixture. Rest everthing in detail description in pdf which I got it in assignment email

Few basic step need to do for setup project

STEP 1=> Take clone of this project
    
        $ git clone https://github.com/Hostpital/OTS.git
        
STEP 2=> Move inside project directory 
    
        $ cd OTS/
        
STEP 3=> For configure project in local, you need to have composer.phar
        
        $ curl -sS https://getcomposer.org/installer | php
        
STEP 4=> Install project in local by using composer.phar

        $ php composer.phar update
        
STEP 5=> Run application using by below command
    
        $ php app/console server:run
        
STEP 6=> Create database for the project

        $ php app/console doctrine:database:create
        
STEP 7=> Create entities & schema 

        $ php app/console generate:doctrine:entities AppBundle && php app/console doctrine:schema:update --force
        
STEP 8 => Final execute fixture command for have some default data 

        $ php app/console doctrine:fixtures:load
        
        Fixture will load OperatingRooms, Specialists, & Anesthetists.

STEP 8 => All controller routes are:- 

        specialist_index           GET        ANY      ANY    /specialist/                     List specialist                       
        specialist_show            GET        ANY      ANY    /specialist/{id}/show            Show specialist  
        specialist_new             GET|POST   ANY      ANY    /specialist/new                  Create specialist  
        specialist_edit            GET|POST   ANY      ANY    /specialist/{id}/edit            Update specialist  
        specialist_delete          DELETE     ANY      ANY    /specialist/{id}/delete          Delete specialist  
        anesthetist_index          GET        ANY      ANY    /anesthetist/                    List anesthetist   
        anesthetist_show           GET        ANY      ANY    /anesthetist/{id}/show           Show anesthetist  
        anesthetist_new            GET|POST   ANY      ANY    /anesthetist/new                 Create anesthetist  
        anesthetist_edit           GET|POST   ANY      ANY    /anesthetist/{id}/edit           Update anesthetist  
        anesthetist_delete         DELETE     ANY      ANY    /anesthetist/{id}/delete         Delete anesthetist  
        patient_index              GET        ANY      ANY    /patient/                        List patient  
        patient_show               GET        ANY      ANY    /patient/{id}/show               Show patient  
        patient_new                GET|POST   ANY      ANY    /patient/new                     Create patient  
        patient_edit               GET|POST   ANY      ANY    /patient/{id}/edit               Update patient  
        patient_delete             DELETE     ANY      ANY    /patient/{id}/delete             Delete patient  
        operatingroom_index        GET        ANY      ANY    /operatingroom/                  List operatingroom  
        operatingroom_show         GET        ANY      ANY    /operatingroom/{id}/show         Show operatingroom  
        operatingroom_new          GET|POST   ANY      ANY    /operatingroom/new               Create operatingroom  
        operatingroom_edit         GET|POST   ANY      ANY    /operatingroom/{id}/edit         Update operatingroom  
        operatingroom_delete       DELETE     ANY      ANY    /operatingroom/{id}/delete       Delete operatingroom  
        session_index              GET        ANY      ANY    /session/                        List session  
        session_show               GET        ANY      ANY    /session/{id}/show               Show session  
        session_new                GET|POST   ANY      ANY    /session/new                     Create session  
        session_edit               GET|POST   ANY      ANY    /session/{id}/edit               Update session  
        session_delete             DELETE     ANY      ANY    /session/{id}/delete             Delete session
        
## Table of Contents
  1. [Draw or create in your favorite tool an overview of the entities and their properties](ERD-OTS.png)
  2. [Draw or create in your favorite tool a database model and the relations.](https://github.com/Hostpital/OTS/tree/master/src/AppBundle/Resources/config/doctrine)
  3. [Write an object oriented method in PHP that gives an overview of the sessions and the specialists and the anesthetists that are scheduled per OR.](https://github.com/Hostpital/OTS/blob/master/src/AppBundle/Manager/Process.php#L32)
  4. [Write an object oriented method in PHP that gives an overview of the sessions and OR’s of a specific specialist.](https://github.com/Hostpital/OTS/blob/master/src/AppBundle/Manager/Process.php#L49)
  5. [Write an object oriented method in PHP that checks if a specialists available in a certain timeslot. Do not write a query, but use the objects you have created.](https://github.com/Hostpital/OTS/blob/master/src/AppBundle/Manager/Process.php#L67)