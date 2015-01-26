#!/usr/bin/env python

"""Download all cover URLs from a list of json files and save them locally."""

import json
import urllib2
import os
import shutil
import time
import uuid

from urllib2 import URLError

USERS = ["MoyenCastor"]

IMG_DIR = "data/images/"
IMG_EXT = [".jpg", ".jpeg", ".png"]
IMG_URL = "https://fistouille.scaron.info/data/images/"
MAX_SIZE = 8 * 1024 * 1024  # 8 MB
UNKNOWN_URL = IMG_URL + "unknown_url.jpg"
VERBOSE = False


class InvalidURL(Exception):

    def __init__(self, url, msg):
        self.url = url
        self.msg = msg

    def __str__(self):
        return "%s\n%s" % (self.msg, self.url)


def validate_url(url_handler):
    try:
        info = url_handler.info()
        if info.maintype != "image":
            raise InvalidURL(url_handler.url, "not an image")

        size = int(info.getheaders("Content-Length")[0])
        if size > MAX_SIZE:
            raise InvalidURL(url_handler.url, "size = %d > 1 MB" % (
                size * 1. / 1024 / 1024))
    except URLError as e:
        raise InvalidURL(url_handler.url, str(e))
    except IndexError:
        raise InvalidURL(url_handler.url, "no Content-Length header")


def prepare_download(url):
    ext = os.path.splitext(url.split('/')[-1])[1].split('?')[0]
    if ext.lower() not in IMG_EXT:
        raise InvalidURL(url, "extension '%s' unrecognized" % ext)
    rand_name = str(uuid.uuid4())
    return "%s%s%s" % (IMG_DIR, rand_name, ext)


def download_pic(url):
    if url[:len(IMG_URL)] == IMG_URL:
        return url
    try:
        url_handler = urllib2.urlopen(url)
        validate_url(url_handler)
        dest_file = prepare_download(url)
        with open(dest_file, "w") as fp:
            if VERBOSE:
                print "Downloading\n<- %s\n-> %s\n" % (url, dest_file)
            fp.write(url_handler.read())
            url = IMG_URL + dest_file
        url_handler.close()
    except (InvalidURL, URLError) as e:
        print "Exception:\n%s\n%s\n" % (url, str(e))
    return url


def download_pics(json_dict):
    selections = json_dict["selections"]
    for month, mo_sel in selections.iteritems():
        for i, sel in enumerate(mo_sel):
            for field, url in sel.iteritems():
                if field == "coverURL":
                    selections[month][i][field] = download_pic(url)
    return True


if __name__ == "__main__":
    for user in USERS:
        json_file = "data/user/%s.json" % user
        save_path = "backups/%s-%d.json" % (user, int(time.time()))
        print "Backup saved to", save_path
        shutil.copyfile(json_file, save_path)
        with open(json_file, "r") as fp:
            jd = json.load(fp)
        if download_pics(jd):
            with open(json_file, "w") as fp:
                json.dump(jd, fp)
