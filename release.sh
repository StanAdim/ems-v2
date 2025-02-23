#!/bin/bash

# Regenerate the `CHANGELOG.md` file.
auto-changelog --template keepachangelog --ignore-commit-pattern "chore: update CHANGELOG.md" -u --hide-empty-releases

# Commit the changes
git add CHANGELOG.md && git commit -m "chore: update CHANGELOG.md" && git push origin

if [[ -n $1 ]];then
    version=$1
    # Regenerate git tags
    git tag -a $version -m $version
fi

git push --tags --force
