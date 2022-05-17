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

                String itemTable = "CREATE TABLE Item( item_id VARCHAR(16) NOT NULL, PRIMARY KEY(item_id)) ENGINE=INNODB;";

                String usersTable = "" +
                                "CREATE TABLE User (" +
                                "username VARCHAR(20), " +
                                "name VARCHAR(50), " +
                                "email VARCHAR(50), " +
                                "password VARCHAR(50), " +
                                "PRIMARY KEY(username)) ENGINE=INNODB";

                String companyTable = "" +
                                "CREATE TABLE Company (" +
                                "company_id VARCHAR(20), " +
                                "name VARCHAR(50), " +
                                "website VARCHAR(50), " +
                                "password VARCHAR(50), " +
                                "PRIMARY KEY(company_id)) ENGINE=INNODB";

                String challengeTable = "CREATE TABLE Challenge( item_id VARCHAR(16) NOT NULL, difficulty INT, problem_statement VARCHAR(5096) NOT NULL, PRIMARY KEY(item_id), CONSTRAINT FOREIGN KEY(item_id) REFERENCES Item(item_id) ON DELETE CASCADE ON UPDATE CASCADE) ENGINE=INNODB";

                String contestTable = "CREATE TABLE Contest( item_id VARCHAR(16) NOT NULL, description VARCHAR(5096) NOT NULL, date DATE NOT NULL, name VARCHAR(128) NOT NULL, duration INT NOT NULL, PRIMARY KEY(item_id), CONSTRAINT FOREIGN KEY(item_id) REFERENCES Item(item_id) ON DELETE CASCADE ON UPDATE CASCADE) ENGINE=INNODB";

                String announcementTable = "CREATE TABLE Announcement( announcement_id VARCHAR(12) NOT NULL, title VARCHAR(128) NOT NULL, description VARCHAR(5096), date DATE, PRIMARY KEY(announcement_id)) ENGINE=INNODB";

                String categoryTable = "CREATE TABLE Category( category_name VARCHAR(64) NOT NULL, description VARCHAR(256), PRIMARY KEY(category_name)) ENGINE=INNODB;";

                String has_categoryTable = "CREATE TABLE has_category(challenge_id VARCHAR(16) NOT NULL, category_name VARCHAR(64) NOT NULL, PRIMARY KEY(challenge_id, category_name), CONSTRAINT FOREIGN KEY(challenge_id) REFERENCES Challenge(item_id) ON DELETE CASCADE ON UPDATE CASCADE, CONSTRAINT FOREIGN KEY(category_name) REFERENCES Category(category_name) ON DELETE CASCADE ON UPDATE CASCADE) ENGINE=INNODB;";

                String savedTable = "CREATE TABLE saves( username VARCHAR(32) NOT NULL, announcement_id VARCHAR(12) NOT NULL, PRIMARY KEY(username, announcement_id), CONSTRAINT FOREIGN KEY(username) REFERENCES User(username) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(announcement_id) REFERENCES Announcement(announcement_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String editorTable = "CREATE TABLE Editor ( editor_id VARCHAR(4) NOT NULL, password VARCHAR(50) NOT NULL, PRIMARY KEY(editor_id)) ENGINE=INNODB;";

                String verifyTable = "CREATE TABLE verify(editor_id VARCHAR(4) NOT NULL, company_id VARCHAR(8) NOT NULL, PRIMARY KEY(company_id), CONSTRAINT FOREIGN KEY(editor_id) REFERENCES Editor(editor_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(company_id) REFERENCES Company(company_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String announceTable = "CREATE TABLE announce( company_id VARCHAR(8) NOT NULL, announcement_id VARCHAR(12) NOT NULL, PRIMARY KEY(announcement_id), CONSTRAINT FOREIGN KEY(company_id) REFERENCES Company(company_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(announcement_id) REFERENCES Announcement(announcement_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String codingTable = "CREATE TABLE Coding( item_id VARCHAR(16) NOT NULL, solution VARCHAR(5096), PRIMARY KEY(item_id)) ENGINE=INNODB;";

                String nonCodingTable = "CREATE TABLE Noncoding( item_id VARCHAR(16) NOT NULL, solution VARCHAR(1024), PRIMARY KEY(item_id)) ENGINE=INNODB;";

                String hasChallengeTable = "CREATE TABLE has_challenge(contest_id VARCHAR(16) NOT NULL, challenge_id VARCHAR(16) NOT NULL, question_number INT, PRIMARY KEY(contest_id, challenge_id), CONSTRAINT FOREIGN KEY(contest_id) REFERENCES Contest(item_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(challenge_id) REFERENCES Challenge(item_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String sponsorTable = "CREATE TABLE sponsor( company_id VARCHAR(8) NOT NULL, contest_id VARCHAR(16), PRIMARY KEY(company_id, contest_id), CONSTRAINT FOREIGN KEY(company_id) REFERENCES Company(company_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(contest_id) REFERENCES Contest(item_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String createTable = "CREATE TABLE create_table(editor_id VARCHAR(4) NOT NULL, item_id VARCHAR(16) NOT NULL, date DATE, PRIMARY KEY(item_id), CONSTRAINT FOREIGN KEY(editor_id) REFERENCES Editor(editor_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(item_id) REFERENCES Item(item_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String languageTable = "CREATE TABLE ProgrammingLanguage( language_name VARCHAR(64) NOT NULL, PRIMARY KEY(language_name)) ENGINE=INNODB;";

                String hasLanguageTable = "CREATE TABLE has_language(challenge_id VARCHAR(16) NOT NULL, language_name VARCHAR(64) NOT NULL, PRIMARY KEY(challenge_id, language_name), CONSTRAINT FOREIGN KEY(challenge_id) REFERENCES Challenge(item_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(language_name) REFERENCES ProgrammingLanguage(language_name) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String testCaseTable = "CREATE TABLE TestCase( test_id VARCHAR(16) NOT NULL, input VARCHAR(128) NOT NULL, expected_output VARCHAR(1024) NOT NULL, PRIMARY KEY(test_id)) ENGINE=INNODB;";

                String testTable = "CREATE TABLE test( coding_id VARCHAR(16) NOT NULL, test_id VARCHAR(16) NOT NULL, PRIMARY KEY(test_id), CONSTRAINT FOREIGN KEY(coding_id) REFERENCES Coding(item_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(test_id) REFERENCES TestCase(test_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String submissionTable = "CREATE TABLE Submission( submission_id VARCHAR(32) NOT NULL, content VARCHAR(5096), date DATE NOT NULL, score INT, programming_lang VARCHAR(32), PRIMARY KEY(submission_id)) ENGINE=INNODB;";

                String submitsTable = "CREATE TABLE submits( username VARCHAR(32) NOT NULL, submission_id VARCHAR(32) NOT NULL, PRIMARY KEY(submission_id), CONSTRAINT FOREIGN KEY(username) REFERENCES User(username) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(submission_id) REFERENCES Submission(submission_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String hasSubmissionTable = "CREATE TABLE has_submission( challenge_id VARCHAR(16) NOT NULL, submission_id VARCHAR(32) NOT NULL, PRIMARY KEY(submission_id), CONSTRAINT FOREIGN KEY(challenge_id) REFERENCES Challenge(item_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(submission_id) REFERENCES Submission(submission_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String enrollTable = "CREATE TABLE enroll( username VARCHAR(32) NOT NULL, contest_id VARCHAR(16) NOT NULL, PRIMARY KEY(username, contest_id), CONSTRAINT FOREIGN KEY(contest_id) REFERENCES Contest(item_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(username) REFERENCES User(username) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String inviteTable = "CREATE TABLE Invite( invite_id VARCHAR(16) NOT NULL, msg VARCHAR(2048), date DATE, PRIMARY KEY(invite_id)) ENGINE=INNODB;";

                String sendsTable = "CREATE TABLE sends( company_id VARCHAR(20) NOT NULL, invite_id VARCHAR(16) NOT NULL, PRIMARY KEY(invite_id), CONSTRAINT FOREIGN KEY(company_id) REFERENCES Company(company_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(invite_id) REFERENCES Invite(invite_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String includesTable = "CREATE TABLE includes( invite_id VARCHAR(16) NOT NULL, interview_id VARCHAR(16) NOT NULL, PRIMARY KEY(invite_id), CONSTRAINT FOREIGN KEY(interview_id) REFERENCES Interview(item_id) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(invite_id) REFERENCES Invite(invite_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String isInvitedTable = "CREATE TABLE is_invited( username VARCHAR(32) NOT NULL, invite_id VARCHAR(16) NOT NULL, PRIMARY KEY(username, invite_id), CONSTRAINT FOREIGN KEY(username) REFERENCES User(username) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT FOREIGN KEY(invite_id) REFERENCES Invite(invite_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String interviewTable = "CREATE TABLE Interview(item_id VARCHAR(16) NOT NULL, title VARCHAR(128), description VARCHAR(1024), earliest_date DATE, latest_date DATE NOT NULL, result INT, duration INT, PRIMARY KEY(item_id), CONSTRAINT FOREIGN KEY(item_id) REFERENCES Contest(item_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=INNODB;";

                String desc1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et tellus rhoncus nibh laoreet vestibulum ac nec lacus. Donec molestie venenatis purus eu malesuada. Nullam facilisis nisl non est cursus suscipit. Ut varius enim nec vehicula pulvinar. Pellentesque blandit viverra tellus, ac eleifend lacus mollis at. Sed ultrices elementum placerat. Fusce sit amet efficitur eros. "
                                + "Integer ligula mauris, imperdiet sit amet suscipit nec, luctus in urna. Integer sagittis sagittis lorem, quis hendrerit leo placerat eu. Suspendisse sed massa scelerisque, hendrerit metus quis, varius diam. In vitae justo justo. Fusce vestibulum id nisi et eleifend. Maecenas posuere, erat id dictum viverra.";

                String desc2 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras egestas maximus eros, in facilisis quam consequat vel. Donec congue sapien blandit tellus posuere, ut accumsan augue commodo. In in semper quam. Curabitur posuere tincidunt pellentesque. Fusce mauris sem, mollis et blandit sit amet, interdum sed ligula. "
                                + "Donec in posuere risus, at semper augue. Nulla id ex sagittis metus convallis eleifend. Nunc pellentesque, risus a tristique lobortis, ex lorem tincidunt diam, sit amet luctus velit eros ut urna. Quisque rhoncus, dolor in convallis aliquet, enim nulla consequat mauris, nec rhoncus lectus mauris a sapien. "
                                + "Maecenas molestie dui a ligula convallis, vel molestie risus accumsan. Curabitur laoreet auctor dui quis molestie. Vestibulum tempus cursus tincidunt. Suspendisse vel nibh volutpat, varius orci nec, sagittis justo. "
                                + "Donec facilisis dictum hendrerit. Pellentesque ut ipsum porta nunc congue vulputate. Sed convallis ex et nunc gravida, at interdum risus molestie. Curabitur vestibulum mauris quis vehicula bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. "
                                + "Ut aliquam scelerisque metus, aliquam sodales augue suscipit et. Aenean at justo efficitur, interdum lorem ut, venenatis dolor. Sed eu urna id augue mattis pretium. Nulla eu pretium turpis. "
                                + "Pellentesque lorem purus, sollicitudin eu suscipit nec, mollis non lorem. Cras sit amet turpis purus. Integer vulputate condimentum fringilla. In vulputate dictum ligula vitae luctus. "
                                + "Nulla convallis nec leo id fermentum. Cras sodales nunc non vestibulum tincidunt. Aenean ut magna mauris. Suspendisse mattis ipsum sit amet molestie bibendum. Nullam maximus neque vitae leo pharetra varius. Nunc pretium orci id velit.";

                String userView = "CREATE VIEW user_view AS (SELECT username, name, email FROM User);";

                String companyView = "CREATE VIEW company_view AS (SELECT company_id, name, website FROM Company);";

                String editorView = "CREATE VIEW editor_view AS (SELECT editor_id FROM Editor);";

                try {
                        s = conn.createStatement();
                        s.executeUpdate("DROP VIEW IF EXISTS user_view;");
                        System.out.println("Dropped user_view");

                        s = conn.createStatement();
                        s.executeUpdate("DROP VIEW IF EXISTS company_view;");
                        System.out.println("Dropped company_view");

                        s = conn.createStatement();
                        s.executeUpdate("DROP VIEW IF EXISTS editor_view;");
                        System.out.println("Dropped editor_view");

                        s.executeUpdate("DROP TABLE IF EXISTS Item");
                        System.out.println("Dropped Item table");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS User");
                        System.out.println("Dropped user table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Company");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Contest");
                        System.out.println("Dropped contest table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Announcement");
                        System.out.println("Dropped announcement table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS has_category");
                        System.out.println("Dropped has_category table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Category");
                        System.out.println("Dropped Category table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Challenge");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS saves");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Editor");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS verify");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS announce");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Coding");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Noncoding");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS has_challenge");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS sponsor");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS create_table");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS ProgrammingLanguage");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS has_language");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS TestCase");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS test");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Submission");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS submits");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS has_submission");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS enroll");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Invite");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS sends");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS includes");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS is_invited");
                        System.out.println("Dropped company table (if it had already existed).");

                        s = conn.createStatement();
                        s.executeUpdate("DROP TABLE IF EXISTS Interview");
                        System.out.println("Dropped company table (if it had already existed).");
                        // --------------------------------
                        s = conn.createStatement();
                        s.executeUpdate(itemTable);
                        System.out.println("Created Item table");

                        s = conn.createStatement();
                        s.executeUpdate(usersTable);
                        System.out.println("Created user table.");

                        s = conn.createStatement();
                        s.executeUpdate(companyTable);
                        System.out.println("Created company table.");

                        s = conn.createStatement();
                        s.executeUpdate(challengeTable);
                        System.out.println("Created challenge table.");

                        s = conn.createStatement();
                        s.executeUpdate(contestTable);
                        System.out.println("Created contest table.");

                        s = conn.createStatement();
                        s.executeUpdate(announcementTable);
                        System.out.println("Created announcement table.");

                        s = conn.createStatement();
                        s.executeUpdate(categoryTable);
                        System.out.println("Created category table.");

                        s = conn.createStatement();
                        s.executeUpdate(has_categoryTable);
                        System.out.println("Created has_category table.");

                        s = conn.createStatement();
                        s.executeUpdate(savedTable);
                        System.out.println("Created savedTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(editorTable);
                        System.out.println("Created editorTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(verifyTable);
                        System.out.println("Created verifyTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(announceTable);
                        System.out.println("Created announceTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(codingTable);
                        System.out.println("Created codingTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(nonCodingTable);
                        System.out.println("Created nonCodingTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(hasChallengeTable);
                        System.out.println("Created hasChallengeTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(sponsorTable);
                        System.out.println("Created sponsorTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(createTable);
                        System.out.println("Created createTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(languageTable);
                        System.out.println("Created languageTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(hasLanguageTable);
                        System.out.println("Created hasLanguageTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(testCaseTable);
                        System.out.println("Created testCaseTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(testTable);
                        System.out.println("Created testTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(submissionTable);
                        System.out.println("Created submissionTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(submitsTable);
                        System.out.println("Created submitsTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(hasSubmissionTable);
                        System.out.println("Created hasSubmissionTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(enrollTable);
                        System.out.println("Created enrollTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(inviteTable);
                        System.out.println("Created inviteTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(interviewTable);
                        System.out.println("Created interviewTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(sendsTable);
                        System.out.println("Created sendsTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(includesTable);
                        System.out.println("Created includesTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(isInvitedTable);
                        System.out.println("Created isInvitedTable table.");

                        s = conn.createStatement();
                        s.executeUpdate(userView);
                        System.out.println("Created userView table.");

                        s = conn.createStatement();
                        s.executeUpdate(companyView);
                        System.out.println("Created companyView table.");

                        s = conn.createStatement();
                        s.executeUpdate(editorView);
                        System.out.println("Created editorView table.");
                        // ----------------------------------------

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO item(item_id) VALUES (1), (2), (3), (4), (5), (7), (8), (9)");

                        s = conn.createStatement();
                        s.executeUpdate("" +
                                        "INSERT INTO User(username, name, email, password) VALUES " +
                                        "('21000001', 'Marco', 'marco@mail.com', '1'), ('21000002', 'Aperson1', 'aperson1@mail.com', '2'), ('21000003', 'Aperson2', 'aperson2@mail.com', '3'), ('21000004', 'Aperson3', 'aperson3@mail.com', '4'), ('21000005', 'Aperson4', 'aperson4@mail.com', '5')");

                        s = conn.createStatement();
                        s.executeUpdate("" +
                                        "INSERT INTO Company(company_id, name, website, password) VALUES " +
                                        "('21000001', 'Company1', 'Company1@mail.com', '1'), ('21000002', 'Company2', 'Company2@mail.com', '2'), ('21000003', 'Company3', 'Company3@mail.com', '3'), ('21000004', 'Company4', 'Company4@mail.com', '4')");

                        s = conn.createStatement();
                        s.executeUpdate("" +
                                        "INSERT INTO Challenge(item_id, difficulty, problem_statement) VALUES " +
                                        "('1', 2, 'deneme'), ('4', 1, '" + desc1 + "'), ('5', 5, '" + desc2
                                        + "'), ('8', 4, '" + desc1 + "'), ('7', 4, '" + desc2 + "')");

                        s = conn.createStatement();
                        s.executeUpdate("" +
                                        "INSERT INTO Contest(item_id, description, date, name, duration) VALUES " +
                                        "('2', '" + desc1 + "', '1998-05-31', 'contest1', 60) , " +
                                        "('3', '" + desc2 + "', '2023-05-31', 'contest2', 90), " +
                                        "('9', '" + desc1 + "', '2023-05-31', 'contest3', 120)");

                        s = conn.createStatement();
                        s.executeUpdate("" +
                                        "INSERT INTO Announcement(announcement_id, title, description, date) VALUES " +
                                        "('1', 'Announcement 1', '" + desc1 + "', '2023-05-31') , " +
                                        "('2', 'Announcement 2', '" + desc2 + "', '2023-07-13'), " +
                                        "('4', 'Announcement 3', '" + desc1 + "', '2023-09-10'), " +
                                        "('5', 'Announcement 5', '" + desc2 + "', '2023-11-13')");

                        s = conn.createStatement();
                        s.executeUpdate("" +
                                        "INSERT INTO Category(category_name, description) VALUES " +
                                        "('hashing', 'description1'), ('category2', 'description2'), ('category3', 'description3'), ('category4', 'description4'), ('category5', 'description5')");

                        s = conn.createStatement();
                        s.executeUpdate("" +
                                        "INSERT INTO has_category(challenge_id, category_name) VALUES " +
                                        "('1', 'hashing'), ('1', 'category2'), ('1', 'category3'), ('4', 'hashing'), ('4', 'category4'), ('4', 'category5'), ('5', 'hashing'), ('5', 'category2'), ('5', 'category3'), ('7', 'hashing'), ('7', 'category2'), ('7', 'category3'), ('8', 'hashing'), ('8', 'category4'), ('8', 'category5')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO saves(username, announcement_id) VALUES " +
                                        "('21000001', '1'), ('21000001', '2'), ('21000001', '4'), ('21000001', '5'), " +
                                        "('21000002', '1'), ('21000002', '2'), ('21000003', '4'), ('21000003', '5'), " +
                                        "('21000004', '1'), ('21000004', '2'), ('21000005', '4'), ('21000005', '5')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO Editor(editor_id, password) VALUES " +
                                        "(1001, 1), (1002, 2), (1003, 3)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO verify(editor_id, company_id) VALUES " +
                                        "(1001, 21000001), (1002, 21000002), (1003, 21000003)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO announce(company_id, announcement_id) VALUES " +
                                        "(21000001, 1), (21000002, 2), (21000003, 5), (21000003, 4)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO Coding(item_id, solution) VALUES " +
                                        "(1, 'solution1'), (4, 'solution4'), (5, 'solution5')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO Noncoding(item_id, solution) VALUES " +
                                        "(7, 'solution7'), (8, 'solution8')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO has_challenge(contest_id, challenge_id, question_number) VALUES " +
                                        "(2, 1, 1), (2, 4, 2), (2, 7, 3), (3, 1, 1), (3, 4, 2), (3, 5, 3), (3, 7, 4), (3, 8, 5)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO sponsor(company_id, contest_id) VALUES " +
                                        "(21000001, 2), (21000001, 3), (21000002, 2), (21000003, 3)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO create_table(editor_id, item_id, date) VALUES " +
                                        "(1001, 1, '2022-05-10'), (1002, 2, '2022-04-10'), (1003, 3, '2022-03-10'), (1001, 4, '2022-05-17'), (1002, 5, '2022-01-01'), (1003, 7, '2022-05-17'), (1001, 8, '2022-05-17')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO ProgrammingLanguage(language_name) VALUES " +
                                        "('Java'), ('C'), ('C++'), ('Python'), ('PHP'), ('Rust'), ('Golang'), ('Javascript')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO has_language(challenge_id, language_name) VALUES " +
                                        "(1, 'Java'), (4, 'Java'), (5, 'Java'), (7, 'Java'), (4, 'C'), (5, 'C'), (5, 'C++'), (7, 'Python'), (8, 'PHP'), (1, 'Rust'), (4, 'Golang'), (5, 'Javascript')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO TestCase(test_id, input, expected_output) VALUES " +
                                        "(1, 'input1', 'output1'), (2, 'input2', 'output2'), (3, 'input3', 'output3'), (4, 'input4', 'output4'), (5, 'input5', 'output5')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO test(coding_id, test_id) VALUES " +
                                        "(1, 1), (1, 2), (4, 4), (4, 5)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO Submission(submission_id, content, date, score, programming_lang) VALUES "
                                        +
                                        "(1, 'submission1', '2022-05-15', 15, 'Java'), (2, 'submission2', '2022-05-15', 20, 'Java'), (3, 'submission3', '2022-05-15', 15, 'C')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO submits(username, submission_id) VALUES " +
                                        "(21000001, 1), (21000001, 2), (21000002, 3)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO has_submission(challenge_id, submission_id) VALUES " +
                                        "(1, 1), (1, 2), (1, 3)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO enroll(username, contest_id) VALUES " +
                                        "(21000001, 2), (21000001, 3), (21000002, 2), (21000003, 3)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO Invite(invite_id, msg, date) VALUES " +
                                        "(1, '" + desc1 + "', '2022-05-15'), (2, '"
                                        + desc2 + "', '2022-05-15'), (3, '"
                                        + desc1 + "', '2022-05-15')");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO sends(company_id, invite_id) VALUES " +
                                        "(21000001, 1), (21000002, 2), (21000003, 3)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO Interview(item_id, title, description, earliest_date, latest_date, result, duration) VALUES "
                                        +
                                        "(2, 'interview1', '" + desc1 + "', '2022-05-15', '2022-05-25', NULL, 120), "
                                        +
                                        "(3, 'interview3', '" + desc1 + "', '2022-05-15', '2022-05-20', NULL, 60)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO includes(invite_id, interview_id) VALUES " +
                                        "(2, 2), (3, 3)");

                        s = conn.createStatement();
                        s.executeUpdate("INSERT INTO is_invited(username, invite_id) VALUES " +
                                        "(21000001, 1), (21000002, 1), (21000003, 2), (21000004, 1), (21000005, 2)");

                } catch (Exception e) {
                        e.printStackTrace();
                }
        }
}
