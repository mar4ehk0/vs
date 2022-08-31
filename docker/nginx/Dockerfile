FROM nginx:1.23.1-alpine  AS base-runtime

ENV PS1='\[\033[1;36m\][${DOCKER_USER-user}@\H] \[\033[1;34m\]\w\[\033[0;35m\] \[\033[1;36m\]# \[\033[0m\]'

ARG APP_DOMAIN
ARG DOCKER_USER
ARG DOCKER_GROUP_NAME
ARG DOCKER_USER_UID
ARG DOCKER_USER_GID
ARG SRC_PATH
ARG PUBLIC_PATH

# create Group and User
RUN addgroup -g $DOCKER_USER_GID $DOCKER_GROUP_NAME && \
    adduser -D -u $DOCKER_USER_UID $DOCKER_USER -G $DOCKER_GROUP_NAME && \
    addgroup $DOCKER_USER 'nginx' && \
    mkdir -p $SRC_PATH && \
    chown $DOCKER_USER: $SRC_PATH

COPY ./docker/nginx/conf/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/conf/mysite.conf /etc/nginx/conf.d/default.conf

RUN sed -i -r "s|%DOCKER_USER%|$DOCKER_USER|g" /etc/nginx/nginx.conf
RUN sed -i -r "s|%PUBLIC_PATH%|$PUBLIC_PATH|g" /etc/nginx/conf.d/default.conf
RUN sed -i -r "s|%APP_DOMAIN%|$APP_DOMAIN|g" /etc/nginx/conf.d/default.conf

FROM base-runtime AS develop-runtime