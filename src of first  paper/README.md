It contains the datasets and the code of our paper:
## On the exploitation of GPS-based data for real-time visualisation of pedestrian dynamics in open environments

### Abstract

Over the past few years, real-time visualisation of pedestrian dynamics has become more crucial to successfully organise and monitor open-crowded events. However, the process of collecting, efficiently handling and visualising a large volume of pedestrians’ dynamic data in real time is challenging. This challenge becomes even more pronounced when pedestrians move in large size, high-density, open and complex environments. In this article, we propose an efficient and accurate approach to acquire, process and visualise pedestrians’ dynamic behaviour in real time. Our goal in this context is to produce GPS-based heat maps that assist event organisers as well as visitors in dynamically finding crowded spots using their smartphone devices. To validate our proposal, we have developed a prototype system for experimentally evaluating the quality of the proposed solution using real-world and simulation-based experimental datasets. The first phase of experiments was conducted in an open area with 37,000 square meters in Palestine. In
the second phase, we have carried out a simulation for 5000 pedestrians to quantify the level of efficiency of the proposed system. We have utilised PHP scripting language to generate a larger-scale sample of randomly moving pedestrians across the same open area. A comparison with two well-known Web-based spatial data visualisation systems was conducted in the third phase. Findings indicate that the proposed approach can collect pedestrian’s GPS-based trajectory information within 4 m horizontal accuracy in real time. The system demonstrated high efficiency in processing, storing, retrieving and visualizing pedestrians’ motion data (in the form of heat maps) in real time.

### Web server

#### Requirements
The  web server should be online and supports PHP7 (or above) and MySQL database.

#### Installation
1. Creating new database in MySQL.
2. Opening the database and Importing MySQL_tables.sql file.
3. Copying Web server directory  to web root directory.
4. Opening the db.php file, and setting the required parameters/variables.


### Android-based mobile application

#### Requirements
Android Studio over Java, compileSdkVersion 29 and minSdkVersion 15.

#### Installation
1. Opening the  project using android studio.
2. Update url1 variable in BackgroundTask.java file line 30 (app\src\main\java\com\example\amm) to the online URL of  insertLocation.php file in a web server.
3. Generating APK file.

### Datasets

We have deployed the developed application on client smartphone devices for tracking their positions and sending this data to the web server for further processing. In particular, the application uses the smartphone’s GPS sensor to determine users’ positions while they are moving in an open space. After the user starts the application and agrees to use it, the application starts collecting the current position of pedestriansmoving at open events periodically (every second), and directly transfers the obtained GPS data over an active internet connection to the web server. The application remains active unless it is explicitly closed by the user. To ensure protecting users’privacy, the application does not collect any private informationabout the smartphone, as it just collects the positions (latitude and longitude) that are spotted inside the event’s area to be visualized later in the form of heat maps. 14184 positions were collected in the real experiment was conducted in several open areas at the new campus at An Najah National University in Palestine. The area of the new campus is about 137.000 square meters, and its bounding box is identified by the following latitude and longitude: (32.22682, 35.22493), (32.2294, 35.2196). Open areas with no high building as well as open areas that are surrounded by high building are selected. Nine users with different types of android mobile phones have installed the android application and participated in the real experiment, the following shows the structure of each row.

 1. Id: A unique identifier for the position (incremental number).
 2. User Id: An identifier for the user (incremental number).
 3. latitude: latitude of the user’s position.
 4. longitude: longitude of the user’s position.
 5. timestamp: Date and time for the obtained position.
 6. Accuracy: horizontal accuracy of the user’s position.

The collected GPS data is available in three types of files (XML, txt (CSV) and SQL)




