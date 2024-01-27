
<script>



import axios from 'axios'; // Make sure to import axios if not already done

async function base64ToFile(b64Data, filename, contentType) {
    // ... (your existing code for base64ToFile)
    const sliceSize = 512;
    const byteCharacters = atob(b64Data);
    const byteArrays = [];
  
    for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
      const slice = byteCharacters.slice(offset, offset + sliceSize);
  
      const byteNumbers = new Array(slice.length);
      for (let i = 0; i < slice.length; i++) {
        byteNumbers[i] = slice.charCodeAt(i);
      }
  
      const byteArray = new Uint8Array(byteNumbers);
      byteArrays.push(byteArray);
    }
  
    const blob = new Blob(byteArrays, { type: contentType });
    const file = new File([blob], filename, { type: contentType });
    return file;
}

async function createImageByDescription(
    description,
    numberImgs = 2,
    size = "1024x1024",
    response_format = "b64_json"
) {
    try {
        const response = await axios.post(
            "https://api.openai.com/v1/images/generations",
            {
                prompt: description,
                n: numberImgs,
                size,
                response_format,
            },
            {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: `Bearer YOUR_OPENAI_API_TOKEN`,
                },
            }
        );

        const imageFiles = await Promise.all(
            response.data.data.map(async (item, index) => {
                const file = await base64ToFile(
                    item.b64_json,
                    `image${index}.png`,
                    "image/png"
                );
                return file;
            })
        );

        console.log("Generated image files:", imageFiles);
        return imageFiles;
    } catch (error) {
        console.log("Error createImageByDescription:", error);
        throw error;
    }
}

// Example usage:
// createImageByDescription("Your description here");

b64Data = "https://oaidalleapiprodscus.blob.core.windows.net/private/org-FcGDQxJWnchkRdLE62KanTMA/user-6Su4iMHxK7sNo1Eyxx1D4EcC/img-azEoktHmvL05C5AX74s5qg4M.png?st=2023-12-31T12%3A16%3A24Z&se=2023-12-31T14%3A16%3A24Z&sp=r&sv=2021-08-06&sr=b&rscd=inline&rsct=image/png&skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2023-12-31T07%3A07%3A09Z&ske=2024-01-01T07%3A07%3A09Z&sks=b&skv=2021-08-06&sig=1IfeDJiBkLFXodOhQbGevqvuHJcCShBIKjkGo/mMk3k%3D";

 rrr = base64ToFile(b64Data, "kaushik", "b64_json") ;

     console.log(rrr);
  </script>
