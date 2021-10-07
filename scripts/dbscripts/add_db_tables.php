<?php
//Get database connection
require 'db_connect.php';

//print_r(PDO::getAvailableDrivers());

try {
    //Create tables if they don't already exist
    $tables = ["CREATE TABLE IF NOT EXISTS users (
        id int(11) NOT NULL AUTO_INCREMENT,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
        first_name varchar(255) NOT NULL,
        last_name varchar(255) NOT NULL,
        username varchar(255) NOT NULL,
        dob date NOT NULL,
        gender varchar(30),
        email varchar(255) NOT NULL,
        password varchar(255) NOT NULL,
        phone varchar(255) NOT NULL,
        address varchar(255) NOT NULL,
        city varchar(255) NOT NULL,
        state varchar(255) NOT NULL,
        zip varchar(10) NOT NULL,
        country varchar(255) NOT NULL,
        PRIMARY KEY (id)
    );","CREATE TABLE IF NOT EXISTS tenants (
        id int(4) NOT NULL AUTO_INCREMENT,	 
        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP,	 
        site_name varchar(255),
        url	varchar(255) NULL,
        logo varchar(255),
        address	varchar(255),
        city varchar(255),
        state varchar(255),
        zip	varchar(10) NOT NULL,
        country	varchar(255),	 
        phone varchar(255),
        marketing_domain varchar(255),
        PRIMARY KEY (id)
    );","CREATE TABLE IF NOT EXISTS talent_hours (
        id int(11) NOT NULL AUTO_INCREMENT,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
        user_id int(11) NOT NULL,
        tenant_id int(11) NOT NULL,
        ot_approved_by int(11) NOT NULL,
        ot_approved_date datetime NOT NULL,
        ot_approved_hrs int(11) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (tenant_id) REFERENCES tenants(id)
    );","CREATE TABLE IF NOT EXISTS events (
        id int(11) NOT NULL AUTO_INCREMENT,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
        tenant_id int(11) NOT NULL,
        title varchar(255) NOT NULL,
        description varchar(255) DEFAULT 'No description entered',
        start_date_time datetime DEFAULT CURRENT_TIMESTAMP,
        end_date_time datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        FOREIGN KEY (tenant_id) REFERENCES tenants(id)
    );"];      
    
    
    //Add tables to database
    foreach ($tables as $table) {
        $dbh->exec($table);
    }
    
    /*
    //Create tenant data to add to the tenants table
    $tenant_vals = [
        ["Senegal Software","app.senegalsoftware.com","ac8ca3e4aafae66a7c878c993e33f1da.png","1417 Dutch Valley Place","Atlanta","GA","30324","US","4045551234","https://www.senegalsoftware.com"],
        ["CMT Agency","cmt.senegalsoftware.com","9cbfc9fa2608a1cd3ef393bee6482323.png","5055 Greenpine Dr","Atlanta","GA","30342","US","4046649857","http://www.cmtagency.com"],
        ["Allie Katz Promotions","akp.senegalsoftware.com","1397419e8f2d7050549c85e0270f59b9.jpg","116 Park Place Circle","Atlanta","GA","29072","US","8036788388","http://www.alliekatzpromotions.com"],
        ["All Aces Promotional Staffing","acespromo.senegalsoftware.com","84afc66dc5f2c1abd41df46a6529d4c1.jpeg","46-28 Vernon Blvd","Atlanta","GA","11101","US","6468291602","http://www.acespromo.com"],
        ["JM Presentations Plus","jmp.senegalsoftware.com","e643f3b7a8bca8a966a9198142559e34.png","12020 Southern Highlands PKWY","Atlanta","GA","89141","US","7029497514","http://www.jmp.com"],
        ["Bella\'s Promotions & Events","bellaspe.senegalsoftware.com","20099bfa0da6ee5a265671d155acf9cd.jpg","1961 Menger Cir","Atlanta","GA","32119","US","3864051067","http://www.bellaspe.com"],
        ["SpokesModels","spokesmodels.senegalsoftware.com","a4005d274a8514005b05d4d15a56d1bf.png","3664 Rainbow Lake Dr","Atlanta","GA","85929","US","2197076005","http://www.spokesmodels.com"],
        ["PS-Stearns Inc.","psstearns.senegalsoftware.com","428ad7554b5048201637aa94ca4473e9.png","3036 W. 26th Street","Atlanta","GA","16506","US","8009397467","http://www.psstearns.com"],
        ["Fusion Event Staffing","fusion.senegalsoftware.com","3e0914df19d9c7d9909d679b48af211d.png","3159 Royal Drive","Atlanta","GA","30022","US","6787621113","http://www.fusion.com"],
        ["FDM Marketing","fdm.senegalsoftware.com","8aa5e87a9b852b7d481252ae1f6d8162.png","81 Oak Hill Road","Red Bank","NJ","07701","US","7327588346","http://www.fdmmarketing.com"],
        ["Oui Demo","ouidemo.senegalsoftware.com","","1810 W. Kennedy Blvd","Atlanta","GA","33606","US","8132992047","http://www.ouidemo.com"],
        ["Next Events & Entertainment","nextevents.senegalsoftware.com","7089a4a1dbeee35a8b6a5750942deed4.png","5830 Palmetto Way","Atlanta","GA","78253","US","2106019815","http://www.nextevents.com"],
        ["Brand Activate","brandactivate.senegalsoftware.com","4cd0c15f9a20fb4edc0d69bca1a38e59.jpg","5308 Derry Ave","Atlanta","GA","91301","US","4802369439","http://www.brandactivate.com"],
        ["Brand XP","brandxp.senegalsoftware.com","","801 E. Fern Ave","Atlanta","GA","78501","US","9563259055","http://www.brandxp.com"],
        ["Creative State","creativestate.senegalsoftware.com","","156 NW 73rd Street","Atlanta","GA","33150","US","3055048877","http://www.creativestate.com"],
        ["Gusto Brand Marketing,gusto.senegalsoftware.com","","20 Court St","Atlanta","GA","1801","US","9175966798","http://www.gusto.com"],
        ["Paradym Group Inc.","paradym.senegalsoftware.com","","c5fa1321af3519ebf5b690787ade9e08.jpeg","100 W Plant Street","Atlanta","GA","34787","US","4077587166","http://www.paradym.com"],
        ["Western Star Models","westernstar.senegalsoftware.com","beab216232bb631cdc5e638e8644cb68.png","12521 Glenwood St","Atlanta","GA","66209","US","8162107162","http://www.westernstar.com"],
        ["SAGASIDY","sagasidy.senegalsoftware.com","c4774b870a7a45dca88d67c6ba0ee2bd.jpg","1707 Post Oak Blvd","Atlanta","GA","77056","US","7137142330","http://www.sagasidy.com"],
        ["Ans1 Agency","ans1.senegalsoftware.com","","House 20","Atlanta","GA","10001","US","4045551234","http://www.ans1.com"],
        ["PMA Staffing","pmastaffing.senegalsoftware.com","","3550 Lenox Road NE","Atlanta","GA","30326","US","6788297674","http://www.pmastaffing.com"],
        ["Sip FX Promotions","sipfx.senegalsoftware.com","","22 Haynee Street","Minton","Montreal","0","Canada","3065274503","http://www.sipfx.com"]
    ];

    //Add tenant data to the tenants table
    foreach ($tenant_vals as $tenant_val) {
            $dbh->exec("INSERT INTO tenants (site_name,url,logo,address,city,state,zip,country,phone,marketing_domain)". 
            "VALUES ('$tenant_val[0]', '$tenant_val[1]', '$tenant_val[2]', '$tenant_val[3]', '$tenant_val[4]', '$tenant_val[5]', '$tenant_val[6]', '$tenant_val[7]', '$tenant_val[8]', '$tenant_val[9]')");
    }

    //Create user data to add to the users table
    $user_vals = [
        ["Laura","Cassidy","lc_user","1987-04-15","Female","lauracassidy41587@yahoo.com","a2effc44578bbd10c6e24cf45db3f321","5023308044","Highland Ridge Blvd","Arlington","Kentucky","41076","United States of America"],
        ["Anthony","Ahmar","aa_user","1978-05-07","Male","anthonyahmar@msn.com","\$2y$10\$NUpz7QRPKDsWMmUuNWcwc.J03m2JTFchRHnFqbnB/6YGsEKUMEMHa","7278584659","1810 East Palm Avenue","Gainsville","Florida","33605","United States of America"],
        ["Pavel","Sfera","ps_user","1965-10-17","Male","pavelsfera@yahoo.com","\$2y$10\$lnFwcHtsgDmY2l7HRAAQbO7wy5da.MYGiP6/sYqpNZNgqTdteD6AW","6198899229","1515 Bellwood Rd","Inglewood","California","91108","United States of America"],
        ["Christine","Alt-Parry","cap_user","1967-05-28","Female","christinealt111@hotmail.com","06a66a0aa7361a9f6accb2c3fa493b38","4842660954","1029 Wiggins Way","Georgetown","Pennsylvania","19380","United States of America"],
        ["Miriana","Andreeva","ma_user","1981-09-26","Female","miriana1981@yahoo.com","\$2y\$10$6j6hiSPOKTlJSgpOFbpB9uJvNd07Jz5dJ6VNS.TanIyC7DLAQyiW.","2147252245","8927 Diceman Drive","Dallas","Texas","75218","United States of America"],
        ["Tim","Suggs","ts_user","1978-01-21","Male","tim@atl.tv","\$2y\$10\$5dgm8miLMbrAZImNshO/T.px17xlqowJ6I2URgOsY4s1l65b16tqC","6783461836","655 Highland Avenue","Duluth","Georgia","30312","United States of America"]
    ];
    
    //Add user data to the users table
    foreach ($user_vals as $user_val) {
        $dbh->exec("INSERT INTO users (first_name,last_name,username,dob,gender,email,password,phone,address,city,state,zip,country)". 
        "VALUES ('$user_val[0]','$user_val[1]','$user_val[2]','$user_val[3]','$user_val[4]','$user_val[5]','$user_val[6]','$user_val[7]','$user_val[8]','$user_val[9]','$user_val[10]','$user_val[11]','$user_val[12]')");
    }

   //Create hours data to add to the talent_hours table
    $hours_vals = [
        ["1","2","5","2021-07-31","10"],["3","2","5","2021-08-05","5"]
    ];

    //Add hours data to the talent_hours table
    foreach ($hours_vals as $hours_val) {
        $dbh->exec("INSERT INTO talent_hours (user_id,tenant_id,ot_approved_by,ot_approved_date,ot_approved_hrs)".
        "VALUES ('$hours_val[0]','$hours_val[1]','$hours_val[2]','$hours_val[3]','$hours_val[4]')");
    }

    //Create events data to add to the events table
    $events_vals = [
        ["1","Homecoming","2021-10-05 18:00:00","2021-10-05 22:00:00"],
        ["1","Duckies","2021-10-09 17:00:00","2021-10-09 21:00:00"],
        ["1","Karter\'s B-day","2021-10-12 00:00:00","2021-10-12 00:00:00"],
        ["1","Cool Ranchers","2021-10-16 09:00:00","2021-10-16 14:00:00"],
        ["1","Charleston","2021-10-23 19:00:00","2021-10-24 00:00:00"],
        ["1","Pepsi Co.","2021-10-04 09:00:00","2021-10-08 17:00:00"]
    ];

    //Add events data to the events table
    foreach ($events_vals as $events_val) {
        $dbh->exec("INSERT INTO events (tenant_id,title,start_date_time,end_date_time)".
        "VALUES ('$events_val[0]','$events_val[1]','$events_val[2]','$events_val[3]')");
    }
    */
}
catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}

$dbh = null;