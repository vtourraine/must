class Track < ActiveRecord::Base
  attr_accessible :artist, :image_url, :title
  belongs_to :selection
end
