![image](https://github.com/user-attachments/assets/e4e8ff14-f745-4c3e-a385-cd5689d0934d)

# Symfony Microservice with gRPC

This repository contains a Symfony-based microservice architecture leveraging **gRPC** for high-performance communication. The project is structured with multiple services and a robust setup for local development using Docker.
It is just for learning basics of **gRPC** communication for microservice architecture, does not include any **ORM** or **Database** actions.

## ✨ Features

- **Symfony Framework**: A powerful PHP framework for building scalable applications.
- **gRPC Integration**: Utilizes Protocol Buffers for efficient service communication.
- **Dockerized Development**: Easily spin up services with Docker and Docker Compose.
- **RoadRunner Integration**: Configured as the PHP application server for enhanced performance.

---

## 🗂️ Project Structure

```
.
├── ProductService (service_a) # Handles product-related logic
│   ├── src                      # Application source code
│   ├── proto                    # Protocol Buffers definitions
│   ├── config                   # Symfony configuration
│   ├── public                   # Entry point for HTTP requests
│   ├── generated                # Auto-generated gRPC classes
│   ├── bin                      # Console commands
│   ├── Dockerfile               # Docker configuration for the service
│   └── entrypoint.sh            # Entrypoint script for container
│   └── .rr.yaml                 # RoadRunner configuration
├── ClientService (service_b)  # Client-facing logic and integration
│   ├── src                      # Application source code
│   ├── proto                    # Protocol Buffers definitions
│   ├── config                   # Symfony configuration
│   ├── public                   # Entry point for HTTP requests
│   ├── Dockerfile               # Docker configuration for the service
│   └── entrypoint.sh            # Entrypoint script for container
├── docker-compose.yaml        # Orchestrates all services
```

---

## 🙌 Getting Started

### Prerequisites

Ensure you have the following installed:

- **Docker** (>= 20.10)
- **Docker Compose** (>= 1.29)

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/oguzhankrcb/symfony-micro-service-with-grpc.git
   cd symfony-micro-service-with-grpc
   ```

2. Build and start the services:
   ```bash
   docker-compose up
   ```

   This command will automatically handle dependency installation and service setup.

3. Access the application:
   - **gRPC Server**: `localhost:8084`
   - **Client Server**: `localhost:8085`

---

## ⚙️ Usage

### Calling gRPC service from ClientService

```bash
docker exec -it XXXXX(service_b container name) sh
/app # bin/console app:get_products
```

### Or you can get information from controller

Open this URL from your browser: `http://localhost:8085/clients/1234/products`

### Configuration

- RoadRunner settings can be adjusted in `.rr.yaml`.

---

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the MIT License. See the `LICENSE` file for details.

---

## 📧 Contact

For any questions or issues, please open an issue or contact [oguzhankrcb@gmail.com](mailto:oguzhankrcb@gmail.com).
