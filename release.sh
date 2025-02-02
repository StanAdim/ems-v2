#!/bin/bash

if [[ -n $1 ]];then
version=$1
    # Generate git tag
    git tag -a $version -m "$version"
fi

# Regenerate the `CHANGELOG.md` file.
auto-changelog --template keepachangelog --ignore-commit-pattern "chore: update CHANGELOG.md" -u --hide-empty-releases

# Commit the changes
git add CHANGELOG.md && git commit -m "chore: update CHANGELOG.md"

if [[ -n $version ]];then
    # Regenerate git tags
    git tag -d $version && git tag -a $version -m $version
fi
