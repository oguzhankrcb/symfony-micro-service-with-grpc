FROM oguzhankrcb/base-php8.3-with-grpc:latest

WORKDIR /app
COPY . .

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["/app/bin/rr", "serve", "-d", "-c", "/app/.rr.yaml"]