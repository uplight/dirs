CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT,username TEXT,password TEXT,name TEXT, email TEXT,url TEXT, sendemail INTEGER, role TEXT);
INSERT2 INTO users (username,password,name,email,url,role) VALUES ('developer','developer','Developer','admin@front-desk.ca','index','test');
CREATE TABLE IF NOT EXISTS categories (id INTEGER PRIMARY KEY AUTOINCREMENT,label TEXT,icon TEXT,type INTEGER,enable INTEGER,sort INTEGER);
CREATE TABLE IF NOT EXISTS destinations (id INTEGER PRIMARY KEY AUTOINCREMENT,uid TEXT,name TEXT,unit TEXT,cats TEXT,kws TEXT,more TEXT,meta TEXT,info TEXT,tmb TEXT,imgs TEXT, pgs TEXT);