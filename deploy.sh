#!/bin/bash

git switch main
git branch -D gh-page
git switch -c gh-page

rm -rf ../backend/

cp -r ../frontend/* ../

git add ..
git commit -m "Build gh-page"
git push -f origin gh-page:gh-page

git switch main
