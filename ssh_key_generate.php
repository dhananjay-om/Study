1. Verify Your SSH Key
First, check if you have an SSH key already created on your machine:

ls -al ~/.ssh
This will list the files in the .ssh directory. You should see files named something like id_rsa and id_rsa.pub or similar.

2. Generate a New SSH Key (if necessary)
If you don't have an SSH key or want to create a new one, follow these steps:

ssh-keygen -t rsa -b 4096 -C "your_email@example.com"

When prompted, save the key to the default location (~/.ssh/id_rsa) and optionally enter a passphrase.

3. Add Your SSH Key to the SSH Agent
Start the SSH agent in the background and add your SSH key:
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_rsa

4. Add Your SSH Key to Your GitHub Account
Copy the SSH key to your clipboard:
cat ~/.ssh/id_rsa.pub

Go to GitHub:

In the upper-right corner of any page, click your profile photo, then click Settings.
In the user settings sidebar, click SSH and GPG keys.
Click New SSH key.
In the "Title" field, add a descriptive label for the new key.
Paste your key into the "Key" field.
Click Add SSH key.
5. Test Your SSH Connection
To make sure everything is set up correctly, run:

ssh -T git@github.com
You should see a message like:
Hi username! You've successfully authenticated, but GitHub does not provide shell access.

6. Retry Pushing to Your Repository
Try running your git push command again: