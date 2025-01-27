#!/bin/sh

# Vérifie si une URL a été fournie en argument
if [ -z "$1" ]; then
    echo "Error: You have to enter: $0 <URL in bit.ly format>"
    exit 1
fi

# Suivre les redirections avec curl et extraire la dernière URL
FINAL_URL=$(curl -I -s -L "$1" | grep -i "^Location:" | cut -d ' ' -f2)

# Vérifie si l'URL finale est vide
if [ -z "$FINAL_URL" ]; then
    echo "Error: Unable to resolve the URL"
else
    echo "$FINAL_URL"
fi