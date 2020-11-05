# Simple ToDo List App using PHP
A Simple To-Do List Application with PHP. A project based on the final project of learning PHP programming basics from codepolitan.

The core of this project is to review most subjects that I learn from all of the previous chapters. It consist of one php file that functions both as tracking the list and their completion status, dealing with input and output from user, and delete unwanted lists. The page tracks the data by saving the user input into an array and saves it as an external file that is serialized (soon I will change it to JSON for better reading externally), and updates the data based by user activity, whether add, update, or delete, by loading the serialized text file, unserialize it, writing the changes, and saves it back into the text file.

The supposed completed version of the project is supposed to be barebone with no css or whatsoever, but I try to make it looks a better with a little bootstrap and css touch. 
