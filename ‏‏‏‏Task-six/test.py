import os
import sys
from openai import OpenAI
from dotenv import load_dotenv

# Load environment variables from .env file
load_dotenv()

api_key = os.getenv("OPENAI_API_KEY")
if not api_key:
    raise ValueError("API key not found. Make sure OPENAI_API_KEY is set in the .env file.")

client = OpenAI(api_key=api_key)

def send_message(message_log):
    completion = client.chat.completions.create(
        model="gpt-3.5-turbo",  # استبدل gpt-4 بـ gpt-3.5-turbo
        messages=[
            {"role": "user", "content": message_log}
        ]
    )
    return completion.choices[0].message.content

def main():
    if len(sys.argv) > 1:
        user_input = sys.argv[1]
    else:
        print("No input provided.")
        return

    response = send_message(user_input)

    print(response)

if __name__ == "__main__":
    main()
