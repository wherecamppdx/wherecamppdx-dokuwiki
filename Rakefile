desc "Expose current directory to writes via www-data"
task :expose do
  sh "setfacl -m g:www-data:rwX -R ."
  sh "setfacl -d -m g:www-data:rwX -R ."
end
