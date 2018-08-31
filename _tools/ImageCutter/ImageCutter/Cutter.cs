using System;
using System.Drawing;

namespace ImageCutter
{
    class Cutter
    {
        public Bitmap Crop(string path)
        {
            int treshold = 230;

            Bitmap originalImage = new Bitmap(path);

            int originalWidth = originalImage.Width, originalHeight = originalImage.Height;

            bool allWhiteRow(int row)
            {
                for (int i = 0; i < originalWidth; ++i)
                    if (originalImage.GetPixel(i, row).R < treshold)
                        return false;
                return true;
            };

            Func<int, bool> allWhiteColumn = col =>
            {
                for (int i = 0; i < originalHeight; ++i)
                    if (originalImage.GetPixel(col, i).R < treshold)
                        return false;
                return true;
            };

            int topmost = 0;
            for (int row = 0; row < originalHeight; ++row)
            {
                if (allWhiteRow(row))
                    topmost = row;
                else break;
            }

            int bottommost = 0;
            for (int row = originalHeight - 1; row >= 0; --row)
            {
                if (allWhiteRow(row))
                    bottommost = row;
                else break;
            }

            int leftmost = 0, rightmost = 0;
            for (int col = 0; col < originalWidth; ++col)
            {
                if (allWhiteColumn(col))
                    leftmost = col;
                else
                    break;
            }

            for (int col = originalWidth - 1; col >= 0; --col)
            {
                if (allWhiteColumn(col))
                    rightmost = col;
                else
                    break;
            }
            int croppedWidth = rightmost - leftmost;
            int croppedHeight = bottommost - topmost;
            if (croppedHeight == 0) croppedHeight = originalHeight;
            if (croppedWidth == 0) croppedWidth = originalWidth;
            try
            {
                Bitmap target = new Bitmap(croppedWidth, croppedHeight);
                using (Graphics g = Graphics.FromImage(target))
                {
                    g.DrawImage(originalImage,
                      new RectangleF(0, 0, croppedWidth, croppedHeight),
                      new RectangleF(leftmost, topmost, croppedWidth, croppedHeight),
                      GraphicsUnit.Pixel);
                }
                return target;
            }
            catch { return originalImage; }
        }
    }
}
