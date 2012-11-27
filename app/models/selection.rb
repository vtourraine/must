class Selection < ActiveRecord::Base
  attr_accessible :month_id
  has_many :tracks, :dependent => :destroy
end
