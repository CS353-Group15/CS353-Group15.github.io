import java.sql.*;

public class Project {
    public static void main(String[] args) throws SQLException {
        Connection conn = null;

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            System.out.println("Driver loaded");

            String username = "root";
            String dbName = "cs353_project";
            String password = "";

            conn = DriverManager.getConnection("jdbc:mysql://localhost/" + dbName, username, password);
        } catch (Exception e) {
            e.printStackTrace();
        }

        Statement s = null;
        String usersTable = "" +
                "CREATE TABLE User (" +
                "username varchar(20), " +
                "name varchar(50), " +
                "email varchar(50), " +
                "password varchar(50), " +
                "PRIMARY KEY(username)) ENGINE=INNODB";

        String companyTable = "" +
                "CREATE TABLE Company (" +
                "company_id varchar(20), " +
                "name varchar(50), " +
                "website varchar(50), " +
                "password varchar(50), " +
                "PRIMARY KEY(company_id)) ENGINE=INNODB";

        String challengeTable = "CREATE TABLE Challenge( item_id CHAR(16) NOT NULL, difficulty INT, problem_statement VARCHAR(5096) NOT NULL, PRIMARY KEY(item_id)) ENGINE=INNODB";

        String contestTable = "CREATE TABLE Contest( item_id CHAR(16) NOT NULL, description VARCHAR(5096) NOT NULL, date DATE NOT NULL, name VARCHAR(128) NOT NULL, duration INT NOT NULL, PRIMARY KEY(item_id)) ENGINE=INNODB";

        String announcementTable = "CREATE TABLE Announcement( announcement_id CHAR(12) NOT NULL, title VARCHAR(128) NOT NULL, description VARCHAR(5096), date DATE, PRIMARY KEY(announcement_id)) ENGINE=INNODB";

        String categoryTable = "CREATE TABLE Category( category_name VARCHAR(64) NOT NULL, description VARCHAR(256), PRIMARY KEY(category_name)) ENGINE=INNODB;";

        String has_categoryTable = "CREATE TABLE has_category(challenge_id CHAR(16) NOT NULL, category_name VARCHAR(64) NOT NULL, PRIMARY KEY(challenge_id, category_name), FOREIGN KEY(challenge_id) REFERENCES Challenge(item_id), FOREIGN KEY(category_name) REFERENCES Category(category_name)) ENGINE=INNODB;";

        try {
            s = conn.createStatement();
            s.executeUpdate("DROP TABLE IF EXISTS User");
            System.out.println("Dropped user table (if it had already existed).");

            s = conn.createStatement();
            s.executeUpdate(usersTable);
            System.out.println("Created user table.");

            s = conn.createStatement();
            s.executeUpdate("DROP TABLE IF EXISTS Company");
            System.out.println("Dropped company table (if it had already existed).");

            s = conn.createStatement();
            s.executeUpdate(companyTable);
            System.out.println("Created company table.");

            s = conn.createStatement();
            s.executeUpdate("DROP TABLE IF EXISTS Challenge");
            System.out.println("Dropped company table (if it had already existed).");

            s = conn.createStatement();
            s.executeUpdate(challengeTable);
            System.out.println("Created challenge table.");

            s = conn.createStatement();
            s.executeUpdate("DROP TABLE IF EXISTS Contest");
            System.out.println("Dropped contest table (if it had already existed).");

            s = conn.createStatement();
            s.executeUpdate(contestTable);
            System.out.println("Created contest table.");

            s = conn.createStatement();
            s.executeUpdate("DROP TABLE IF EXISTS Announcement");
            System.out.println("Dropped announcement table (if it had already existed).");

            s = conn.createStatement();
            s.executeUpdate(announcementTable);
            System.out.println("Created announcement table.");

            s = conn.createStatement();
            s.executeUpdate("DROP TABLE IF EXISTS Category");
            System.out.println("Dropped Category table (if it had already existed).");

            s = conn.createStatement();
            s.executeUpdate(categoryTable);
            System.out.println("Created announcement table.");

            s = conn.createStatement();
            s.executeUpdate("DROP TABLE IF EXISTS has_category");
            System.out.println("Dropped has_category table (if it had already existed).");

            s = conn.createStatement();
            s.executeUpdate(has_categoryTable);
            System.out.println("Created announcement table.");


            s = conn.createStatement();
            s.executeUpdate("" +
                    "INSERT INTO User(username, name, email, password) VALUES " +
                    "('21000001', 'Marco', 'marco@mail.com', '1')");

            s = conn.createStatement();
            s.executeUpdate("" +
                    "INSERT INTO Company(company_id, name, website, password) VALUES " +
                    "('21000001', 'Marco', 'marco@mail.com', '1')");

            s = conn.createStatement();
            s.executeUpdate("" +
                    "INSERT INTO Challenge(item_id, difficulty, problem_statement) VALUES " +
                    "('1', 2, '')");

            s = conn.createStatement();
            s.executeUpdate("" +
                    "INSERT INTO Contest(item_id, description, date, name, duration) VALUES " +
                    "('2', '', '1998-05-31', '2', 10) , " +
                    "('3', '', '2023-05-31', '3', 10)");

            s = conn.createStatement();
            s.executeUpdate("" +
                    "INSERT INTO Announcement(announcement_id, title, description, date) VALUES " +
                    "('1', 'Announcement 1', '', '2023-05-31') , " +
                    "('2', 'Announcement 2', '', '2023-07-13')");

            s = conn.createStatement();
            s.executeUpdate("" +
                    "INSERT INTO Category(category_name, description) VALUES " +
                    "('hashing', '')");

            s = conn.createStatement();
            s.executeUpdate("" +
                    "INSERT INTO has_category(challenge_id, category_name) VALUES " +
                    "('1', 'hashing')");

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
