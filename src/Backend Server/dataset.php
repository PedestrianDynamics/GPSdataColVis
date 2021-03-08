 
  
  	<div style="font-size:13pt; padding:50px">
  	      <h3> Real Data Set</h3>
  	    
  	       We  have  deployed  thedeveloped application on client smartphone devices for trackingtheir positions and sending this data to the web server for furtherprocessing.  In particular, the application uses the smartphone’sGPS sensor to determine users’ positions while they are movingin an open space.  After the user starts the application and agreesto use its associated GPS data collector for research purposes, theapplication starts collecting the current position of pedestriansmoving at open events periodically (every second), and directly transfers the obtained GPS data over an active internet connection  to  the  web  server.   The  application  remains  active  unlessit  is  explicitly  closed  by  the  user. To  ensure  protecting  users’privacy, the application does not collect any private informationabout the smartphone, as it just collects the positions (latitudeand longitude) that are spotted inside the event’s area to be visualized later in the form of heat maps.
  	       
  	       14184 positions were collected in the real experiment was conducted in several open areas at the new campus at An Najah National University in Palestine. The area of the new campus is about 137.000 square meters, and its bounding box is identified by the following latitude and longitude: (32.22682, 35.22493), (32.2294, 35.2196). Open area with no high building as well as open area that are surrounded by high building are selected. Nine users with different types of android mobile phones have installed the android application and participated in the real experiment, the following table shows the structure of the data.
       
  	   
            <br/><br/>
      
      <table border="1">
          <tr>
              <th>Field</th>
             <th>Description</th>
          </tr>
          
          <tr>
              <td>Id</td>
             <td>A unique identifier for the position (incremental number)</td>
          </tr>
          
          <tr>
              <td>User Id</td>
             <td>An identifier for the user (incremental number)</td>
          </tr>
          
          <tr>
              <td>latitude</td>
             <td>latitude of the user’s position</td>
          </tr>
          
          <tr>
              <td>longitude</td>
             <td>longitude of the user’s position</td>
          </tr>
          
          <tr>
              <td>timestamp</td>
             <td>Date and time for the obtained position</td>
          </tr>
          
          <tr>
              <td>Accuracy</td>
             <td>horizontal accuracy of the user’s position</td>
          </tr>
      </table>
      
      
      <br/><br/>
      
      The collected GPS data is available in various formats which are as follows:
      	<ul>
   	 	    <li><a href="dataset/dataset.csv" class="app">CSV</a></li>
   	 	    <li><a href="dataset/dataset.sql" class="app">SQL</a></li>
   	 	   	<li><a href="dataset/dataset.json" class="app">JSON</a></li>
   	 	    <li><a href="dataset/dataset.xml" class="app">xml</a></li>
   	 	    
   	 	</ul>
   	 	</div>
   	 
 	  
 
  
 		
 		
  
 