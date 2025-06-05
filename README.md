# This project using symfony to run. 

So you need set up an environment with suport for symfony when run this code. I set it with help of composer and localy run with PHP server.
 
How to fork or clone and the diffrence https://dev.to/danielasaboro/git-fork-and-clone-whats-the-difference-190c and a quick guide how you set up a Symfony project from sratch, some parts can you reuse to start this project https://www.youtube.com/watch?v=GLoRotoKFGo 



If you clone this project, some files are missing, and you need to follow the links above to make it run.

So, a little checklist:
- Make sure you have set up your .env file and configured a database, either SQLite or MySQL, for example.
- Some files are missing in this case: `doc.html.twig, metrics.html.twig, report.html.twig, and database.html.twig`. As these are just report files, you can either remove them from the route or use them with your own content.
- You may need to adjust permissions for the uploads inside the public folder so the server can write images to that folder.
- Some images are not uploaded either, and in some cases, the image links may be broken, but mostly this corresponds to files that are not uploaded to GitHub. In other cases you can replace with your own ideas.