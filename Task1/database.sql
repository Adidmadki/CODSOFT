
CREATE DATABASE quiz_app;
USE quiz_app;

CREATE TABLE users(
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 email VARCHAR(100) UNIQUE,
 password VARCHAR(255),
 role ENUM('admin','user') DEFAULT 'user'
);

CREATE TABLE quizzes(
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(100)
);

CREATE TABLE questions(
 id INT AUTO_INCREMENT PRIMARY KEY,
 quiz_id INT,
 question TEXT,
 a VARCHAR(255),
 b VARCHAR(255),
 c VARCHAR(255),
 d VARCHAR(255),
 correct CHAR(1)
);

CREATE TABLE results(
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT,
 quiz_id INT,
 score INT,
 created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users(name,email,password,role)
VALUES('Admin','admin@admin.com',MD5('admin123'),'admin');

INSERT INTO quizzes(title) VALUES
('HTML Basics'),('CSS Basics'),('JavaScript'),('PHP'),('General Tech');

-- 10 questions each (sample)
INSERT INTO questions(quiz_id,question,a,b,c,d,correct) VALUES
(1,'HTML stands for?','Hyper Text Markup Language','Home Tool','Hyperlinks','None','A'),
(1,'HTML tag for link?','<a>','<p>','<div>','<img>','A'),
(1,'Tag for image?','<img>','<a>','<src>','<pic>','A'),
(1,'HTML is?','Language','Database','OS','Server','A'),
(1,'Largest heading?','h1','h6','h3','h5','A'),
(1,'Line break tag?','<br>','<hr>','<p>','<lb>','A'),
(1,'List tag?','<ul>','<div>','<span>','<olx>','A'),
(1,'Table tag?','<table>','<tab>','<tr>','<td>','A'),
(1,'Form tag?','<form>','<input>','<field>','<data>','A'),
(1,'HTML file ext?','.html','.css','.js','.php','A');

-- duplicate simple questions for other quizzes
INSERT INTO questions(quiz_id,question,a,b,c,d,correct)
SELECT 2,question,a,b,c,d,correct FROM questions WHERE quiz_id=1;
INSERT INTO questions(quiz_id,question,a,b,c,d,correct)
SELECT 3,question,a,b,c,d,correct FROM questions WHERE quiz_id=1;
INSERT INTO questions(quiz_id,question,a,b,c,d,correct)
SELECT 4,question,a,b,c,d,correct FROM questions WHERE quiz_id=1;
INSERT INTO questions(quiz_id,question,a,b,c,d,correct)
SELECT 5,question,a,b,c,d,correct FROM questions WHERE quiz_id=1;
