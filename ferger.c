#include <stdio.h>
#include <stdlib.h>
#include <curl/curl.h>

// Define a callback function to handle the received data
size_t write_callback(void *ptr, size_t size, size_t nmemb, FILE *stream) {
    return fwrite(ptr, size, nmemb, stream);
}

int main(int argc, char *argv[]) {
    CURL *curl;
    CURLcode res;

    if (argc < 2) {
        printf("Usage: %s <url>\n", argv[0]);
        return 1;
    }

    curl = curl_easy_init();
    if (curl) {
        FILE *output_file = fopen("output.html", "w"); // Open a file to write the received data

        // Set the URL to fetch
        curl_easy_setopt(curl, CURLOPT_URL, argv[1]);

        // Set the callback function to write received data to the file
        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, write_callback);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, output_file);

        // Perform the request
        res = curl_easy_perform(curl);
        if (res != CURLE_OK)
            fprintf(stderr, "curl_easy_perform() failed: %s\n", curl_easy_strerror(res));

        // Clean up
        curl_easy_cleanup(curl);
        fclose(output_file);

        // Display the fetched content
        FILE *input_file = fopen("output.html", "r");
        if (input_file) {
            int c;
            while ((c = fgetc(input_file)) != EOF)
                putchar(c);
            fclose(input_file);
        } else {
            fprintf(stderr, "Failed to open output.html\n");
            return 1;
        }
    } else {
        fprintf(stderr, "Failed to initialize curl\n");
        return 1;
    }

    return 0;
}
