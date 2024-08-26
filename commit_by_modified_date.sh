#!/bin/bash

# Iterate through all folders and files in the main directory
for folder in */; do
    for file in "$folder"*; do
        if [ -f "$file" ]; then
            # Get the last modified date of the file
            last_modified=$(git log -1 --format=%cd "$file")
            
            # Check if the file has been committed before
            if [ -z "$last_modified" ]; then
                last_modified=$(stat -c %y "$file")
            fi
            
            # Stage the file
            git add "$file"
            
            # Commit the file with the last modified date
            GIT_COMMITTER_DATE="$last_modified" git commit --date="$last_modified" -m "Commit $file based on last modified date"
        fi
    done
done
