@echo off
FOR %%c IN (coffee\*.coffee) DO coffee -c -o js %%c
