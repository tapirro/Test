
-----------------------------------------------------------------------------
-- blog
-----------------------------------------------------------------------------

DROP TABLE "blog" CASCADE;

DROP SEQUENCE "blog_seq";

CREATE SEQUENCE "blog_seq";


CREATE TABLE "blog"
(
	"id" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"title" VARCHAR(128),
	"content" TEXT,
	"spic" INTEGER,
	"rank" INTEGER default 0 NOT NULL,
	"hidden" BOOLEAN,
	"modeid" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "blog" IS '';


SET search_path TO public;
CREATE INDEX "blog_FI_1" ON "blog" ("userid");

CREATE INDEX "blog_FI_2" ON "blog" ("spic");

-----------------------------------------------------------------------------
-- blog_comment
-----------------------------------------------------------------------------

DROP TABLE "blog_comment" CASCADE;

DROP SEQUENCE "blog_comment_seq";

CREATE SEQUENCE "blog_comment_seq";


CREATE TABLE "blog_comment"
(
	"id" INTEGER  NOT NULL,
	"blogid" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"content" TEXT,
	"created_at" TIMESTAMP,
	"rank" INTEGER,
	"hidden" BOOLEAN,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "blog_comment" IS '';


SET search_path TO public;
CREATE INDEX "FI__19" ON "blog_comment" ("blogid");

CREATE INDEX "FI__20" ON "blog_comment" ("userid");

-----------------------------------------------------------------------------
-- mode
-----------------------------------------------------------------------------

DROP TABLE "mode" CASCADE;

DROP SEQUENCE "mode_seq";

CREATE SEQUENCE "mode_seq";


CREATE TABLE "mode"
(
	"id" INTEGER  NOT NULL,
	"name" VARCHAR(128),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "mode" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- stat
-----------------------------------------------------------------------------

DROP TABLE "stat" CASCADE;

DROP SEQUENCE "stat_seq";

CREATE SEQUENCE "stat_seq";


CREATE TABLE "stat"
(
	"id" INTEGER  NOT NULL,
	"name" VARCHAR(128),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "stat" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- urgency
-----------------------------------------------------------------------------

DROP TABLE "urgency" CASCADE;

DROP SEQUENCE "urgency_seq";

CREATE SEQUENCE "urgency_seq";


CREATE TABLE "urgency"
(
	"id" INTEGER  NOT NULL,
	"name" VARCHAR(128),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "urgency" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- permission
-----------------------------------------------------------------------------

DROP TABLE "permission" CASCADE;

DROP SEQUENCE "permission_seq";

CREATE SEQUENCE "permission_seq";


CREATE TABLE "permission"
(
	"id" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"objectid" INTEGER,
	"model" VARCHAR(128),
	"mode" INTEGER,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "permission" IS '';


SET search_path TO public;
CREATE INDEX "permission_FI_1" ON "permission" ("userid");

CREATE INDEX "FI_model" ON "permission" ("model");

-----------------------------------------------------------------------------
-- picture
-----------------------------------------------------------------------------

DROP TABLE "picture" CASCADE;

DROP SEQUENCE "picture_seq";

CREATE SEQUENCE "picture_seq";


CREATE TABLE "picture"
(
	"id" INTEGER  NOT NULL,
	"content" TEXT,
	"userid" INTEGER  NOT NULL,
	"owner" INTEGER,
	"stat" INTEGER,
	"cost" FLOAT,
	"name" VARCHAR(128),
	"modeid" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"rank" INTEGER default 0 NOT NULL,
	"privte" BOOLEAN,
	"not_for_sale" BOOLEAN,
	"hidden" BOOLEAN,
	PRIMARY KEY ("id"),
	CONSTRAINT "pictureu" UNIQUE ("name")
);

COMMENT ON TABLE "picture" IS '';


SET search_path TO public;
CREATE INDEX "picture_I_1" ON "picture" ("owner");

CREATE INDEX "FI__45" ON "picture" ("userid");

-----------------------------------------------------------------------------
-- picture_comment
-----------------------------------------------------------------------------

DROP TABLE "picture_comment" CASCADE;

DROP SEQUENCE "picture_comment_seq";

CREATE SEQUENCE "picture_comment_seq";


CREATE TABLE "picture_comment"
(
	"id" INTEGER  NOT NULL,
	"pictureid" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"content" TEXT,
	"created_at" TIMESTAMP,
	"rank" INTEGER,
	"hidden" BOOLEAN,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "picture_comment" IS '';


SET search_path TO public;
CREATE INDEX "FI__17" ON "picture_comment" ("pictureid");

CREATE INDEX "FI__18" ON "picture_comment" ("userid");

-----------------------------------------------------------------------------
-- test
-----------------------------------------------------------------------------

DROP TABLE "test" CASCADE;

DROP SEQUENCE "test_seq";

CREATE SEQUENCE "test_seq";


CREATE TABLE "test"
(
	"id" INTEGER  NOT NULL,
	"taskid" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"content" TEXT,
	"succes" BOOLEAN,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "test" IS '';


SET search_path TO public;
CREATE INDEX "FI__57" ON "test" ("taskid");

CREATE INDEX "FI__58" ON "test" ("userid");

-----------------------------------------------------------------------------
-- post
-----------------------------------------------------------------------------

DROP TABLE "post" CASCADE;

DROP SEQUENCE "post_seq";

CREATE SEQUENCE "post_seq";


CREATE TABLE "post"
(
	"id" INTEGER  NOT NULL,
	"blogid" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"title" VARCHAR(128),
	"content" TEXT,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"rank" INTEGER,
	"hidden" BOOLEAN,
	"modeid" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "post" IS '';


SET search_path TO public;
CREATE INDEX "FI__03" ON "post" ("userid");

CREATE INDEX "FI__08" ON "post" ("blogid");

CREATE INDEX "post_FI_3" ON "post" ("modeid");

-----------------------------------------------------------------------------
-- task
-----------------------------------------------------------------------------

DROP TABLE "task" CASCADE;

DROP SEQUENCE "post_seq";

CREATE SEQUENCE "post_seq";


CREATE TABLE "task"
(
	"id" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"authorid" INTEGER  NOT NULL,
	"title" VARCHAR(128),
	"content" TEXT,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"rank" INTEGER,
	"hidden" BOOLEAN,
	"statid" INTEGER  NOT NULL,
	"urgencyid" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "task" IS '';


SET search_path TO public;
CREATE INDEX "FI__53" ON "task" ("userid");

-----------------------------------------------------------------------------
-- task_comment
-----------------------------------------------------------------------------

DROP TABLE "task_comment" CASCADE;

DROP SEQUENCE "task_comment_seq";

CREATE SEQUENCE "task_comment_seq";


CREATE TABLE "task_comment"
(
	"id" INTEGER  NOT NULL,
	"taskid" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"content" TEXT,
	"created_at" TIMESTAMP,
	"rank" INTEGER,
	"pid" INTEGER,
	"hidden" BOOLEAN,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "task_comment" IS '';


SET search_path TO public;
CREATE INDEX "FI__04" ON "task_comment" ("taskid");

CREATE INDEX "FI__05" ON "task_comment" ("userid");

-----------------------------------------------------------------------------
-- post_comment
-----------------------------------------------------------------------------

DROP TABLE "post_comment" CASCADE;

DROP SEQUENCE "post_comment_seq";

CREATE SEQUENCE "post_comment_seq";


CREATE TABLE "post_comment"
(
	"id" INTEGER  NOT NULL,
	"postid" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"content" TEXT,
	"created_at" TIMESTAMP,
	"rank" INTEGER,
	"pid" INTEGER,
	"hidden" BOOLEAN,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "post_comment" IS '';


SET search_path TO public;
CREATE INDEX "FI__04" ON "post_comment" ("postid");

CREATE INDEX "FI__05" ON "post_comment" ("userid");

-----------------------------------------------------------------------------
-- rank
-----------------------------------------------------------------------------

DROP TABLE "rank" CASCADE;

DROP SEQUENCE "rank_seq";

CREATE SEQUENCE "rank_seq";


CREATE TABLE "rank"
(
	"id" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"objectid" INTEGER,
	"model" VARCHAR(128),
	"value" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rank" IS '';


SET search_path TO public;
CREATE INDEX "rank_FI_1" ON "rank" ("userid");

-----------------------------------------------------------------------------
-- sf_tag
-----------------------------------------------------------------------------

DROP TABLE "sf_tag" CASCADE;

DROP SEQUENCE "sf_tag_seq";

CREATE SEQUENCE "sf_tag_seq";


CREATE TABLE "sf_tag"
(
	"id" INTEGER  NOT NULL,
	"name" VARCHAR(100),
	"is_triple" INTEGER,
	"triple_namespace" VARCHAR(100),
	"triple_key" VARCHAR(100),
	"triple_value" VARCHAR(100),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "sf_tag" IS '';


SET search_path TO public;
CREATE INDEX "name" ON "sf_tag" ("name");

CREATE INDEX "triple1" ON "sf_tag" ("triple_namespace");

CREATE INDEX "triple2" ON "sf_tag" ("triple_key");

CREATE INDEX "triple3" ON "sf_tag" ("triple_value");

-----------------------------------------------------------------------------
-- sf_tagging
-----------------------------------------------------------------------------

DROP TABLE "sf_tagging" CASCADE;

DROP SEQUENCE "sf_tagging_seq";

CREATE SEQUENCE "sf_tagging_seq";


CREATE TABLE "sf_tagging"
(
	"id" INTEGER  NOT NULL,
	"tag_id" INTEGER  NOT NULL,
	"taggable_model" VARCHAR(30),
	"taggable_id" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "sf_tagging" IS '';


SET search_path TO public;
CREATE INDEX "tag" ON "sf_tagging" ("tag_id");

CREATE INDEX "taggable" ON "sf_tagging" ("taggable_model","taggable_id");

-----------------------------------------------------------------------------
-- statmsg
-----------------------------------------------------------------------------

DROP TABLE "statmsg" CASCADE;

DROP SEQUENCE "statmsg_seq";

CREATE SEQUENCE "statmsg_seq";


CREATE TABLE "statmsg"
(
	"id" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"content" VARCHAR(255),
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "statmsg" IS '';


SET search_path TO public;
CREATE INDEX "SM__userid" ON "statmsg" ("userid");

-----------------------------------------------------------------------------
-- sys_pic
-----------------------------------------------------------------------------

DROP TABLE "sys_pic" CASCADE;

DROP SEQUENCE "sys_pic_seq";

CREATE SEQUENCE "sys_pic_seq";


CREATE TABLE "sys_pic"
(
	"id" INTEGER  NOT NULL,
	"filename" VARCHAR(128),
	"hidden" BOOLEAN,
	PRIMARY KEY ("id"),
	CONSTRAINT "syspicu" UNIQUE ("filename")
);

COMMENT ON TABLE "sys_pic" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- usr
-----------------------------------------------------------------------------

DROP TABLE "usr" CASCADE;

DROP SEQUENCE "usr_seq";

CREATE SEQUENCE "usr_seq";


CREATE TABLE "usr"
(
	"id" INTEGER  NOT NULL,
	"pass" VARCHAR(128),
	"login" VARCHAR(64),
	"email" VARCHAR(64),
	"upic" INTEGER,
	"rank" INTEGER,
	"balance" DOUBLE PRECISION,
	"bot" BOOLEAN,
	"hidden" BOOLEAN,
	"color" VARCHAR(6),
	"date_birth" TIMESTAMP,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	PRIMARY KEY ("id"),
	CONSTRAINT "usru" UNIQUE ("email")
);

COMMENT ON TABLE "usr" IS '';


SET search_path TO public;
CREATE INDEX "usr_FI_1" ON "usr" ("upic");

CREATE INDEX "hidden" ON "usr" ("hidden");

-----------------------------------------------------------------------------
-- usr_comment
-----------------------------------------------------------------------------

DROP TABLE "usr_comment" CASCADE;

DROP SEQUENCE "usr_comment_seq";

CREATE SEQUENCE "usr_comment_seq";


CREATE TABLE "usr_comment"
(
	"id" INTEGER  NOT NULL,
	"userid" INTEGER  NOT NULL,
	"user2" INTEGER  NOT NULL,
	"content" TEXT,
	"created_at" TIMESTAMP,
	"rank" INTEGER,
	"hidden" BOOLEAN,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "usr_comment" IS '';


SET search_path TO public;
CREATE INDEX "FI__15" ON "usr_comment" ("userid");

CREATE INDEX "FI__16" ON "usr_comment" ("user2");

ALTER TABLE "blog" ADD CONSTRAINT "blog_FK_1" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "blog" ADD CONSTRAINT "blog_FK_2" FOREIGN KEY ("spic") REFERENCES "sys_pic" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "blog" ADD CONSTRAINT "blog_FK_3" FOREIGN KEY ("modeid") REFERENCES "mode" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "blog_comment" ADD CONSTRAINT "blog_comment_FK_1" FOREIGN KEY ("blogid") REFERENCES "blog" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "blog_comment" ADD CONSTRAINT "blog_comment_FK_2" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "permission" ADD CONSTRAINT "permission_FK_1" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "picture" ADD CONSTRAINT "picture_FK_1" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "picture" ADD CONSTRAINT "picture_FK_2" FOREIGN KEY ("owner") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "picture" ADD CONSTRAINT "picture_FK_3" FOREIGN KEY ("modeid") REFERENCES "mode" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "picture_comment" ADD CONSTRAINT "picture_comment_FK_1" FOREIGN KEY ("pictureid") REFERENCES "picture" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "picture_comment" ADD CONSTRAINT "picture_comment_FK_2" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "test" ADD CONSTRAINT "test_FK_1" FOREIGN KEY ("taskid") REFERENCES "picture" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "test" ADD CONSTRAINT "test_FK_2" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "post" ADD CONSTRAINT "post_FK_1" FOREIGN KEY ("blogid") REFERENCES "blog" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "post" ADD CONSTRAINT "post_FK_2" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "post" ADD CONSTRAINT "post_FK_3" FOREIGN KEY ("modeid") REFERENCES "mode" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "task" ADD CONSTRAINT "task_FK_1" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "task" ADD CONSTRAINT "task_FK_2" FOREIGN KEY ("authorid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "task" ADD CONSTRAINT "task_FK_3" FOREIGN KEY ("statid") REFERENCES "stat" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "task" ADD CONSTRAINT "task_FK_4" FOREIGN KEY ("urgencyid") REFERENCES "urgency" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "task_comment" ADD CONSTRAINT "task_comment_FK_1" FOREIGN KEY ("taskid") REFERENCES "task" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "task_comment" ADD CONSTRAINT "task_comment_FK_2" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "post_comment" ADD CONSTRAINT "post_comment_FK_1" FOREIGN KEY ("postid") REFERENCES "post" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "post_comment" ADD CONSTRAINT "post_comment_FK_2" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "rank" ADD CONSTRAINT "rank_FK_1" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "sf_tagging" ADD CONSTRAINT "sf_tagging_FK_1" FOREIGN KEY ("tag_id") REFERENCES "sf_tag" ("id") ON UPDATE RESTRICT ON DELETE CASCADE;

ALTER TABLE "statmsg" ADD CONSTRAINT "statmsg_FK_1" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "usr" ADD CONSTRAINT "usr_FK_1" FOREIGN KEY ("upic") REFERENCES "sys_pic" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "usr_comment" ADD CONSTRAINT "usr_comment_FK_1" FOREIGN KEY ("userid") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE "usr_comment" ADD CONSTRAINT "usr_comment_FK_2" FOREIGN KEY ("user2") REFERENCES "usr" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;
