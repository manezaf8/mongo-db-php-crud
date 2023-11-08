# mongo-db-php-crud

# Mongodb and php crud 

+ Run `composer require mongodb/mongodb` to get the vendor file with libraries.
+ Run `composer require twbs/bootstrap` for bootstrap libraries

if you are working on this project on `ubuntu` you should install mongoDB ext using this link
https://www.mongodb.com/docs/manual/tutorial/install-mongodb-on-ubuntu/

# RUN the following
- `sudo apt-get install gnupg curl`
- curl -fsSL https://pgp.mongodb.com/server-7.0.asc | \
   sudo gpg -o /usr/share/keyrings/mongodb-server-7.0.gpg \
   --dearmor
- echo "deb [ arch=amd64,arm64 signed-by=/usr/share/keyrings/mongodb-server-7.0.gpg ] https://repo.mongodb.org/apt/ubuntu jammy/mongodb-org/7.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-7.0.list

- `sudo apt-get install -y mongodb-org`

- echo "mongodb-org hold" | sudo dpkg --set-selections
echo "mongodb-org-database hold" | sudo dpkg --set-selections
echo "mongodb-org-server hold" | sudo dpkg --set-selections
echo "mongodb-mongosh hold" | sudo dpkg --set-selections
echo "mongodb-org-mongos hold" | sudo dpkg --set-selections
echo "mongodb-org-tools hold" | sudo dpkg --set-selections

- Then you can run the `composer install`
