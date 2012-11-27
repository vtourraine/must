Must::Application.routes.draw do
  
  resources :selections

  resources :tracks

  root :to => 'selections#index'
  
end
